<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UserRepository;
use App\Repository\UERepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(UserRepository $userRepository, UERepository $ueRepository): Response
    {
        $users = $userRepository->findAllUsersSortedByName();
        $ues = $ueRepository->findAllUes();

        return $this->render('admin/admin.html.twig', [
            'users' => $users,
            'ues' => $ues,
            'user_sp' => new Users(),
        ]);
    }

    #[Route('/admin/user/add', name: 'add_user')]
    #[Route('/admin/user/edit/{id}', name: 'edit_user')]
    public function manageUser(Request $request, UserRepository $userRepository, UERepository $ueRepository, EntityManagerInterface $entityManager, $id = null): Response
    {
        if ($id) {
            $user = $userRepository->find($id);
            if (!$user) {
                throw $this->createNotFoundException('Utilisateur non trouvé');
            }
        } else {
            $user = new Users();
        }

        if ($request->isMethod('POST')) {
            $user->setFirstName($request->request->get('prenom'));
            $user->setLastName($request->request->get('nom'));
            $user->setEmail($request->request->get('email'));
            $user->setRole($request->request->get('role'));
            
            $password = $request->request->get('password');
            if ($password) {
                $user->setPassword(password_hash($password, PASSWORD_BCRYPT));
            }

            $selectedUes = json_decode($request->request->get('ues'), true);
            if (!empty($selectedUes)) {
                $user->clearUes();
                foreach ($selectedUes as $ueId) {
                    $ue = $ueRepository->find($ueId);
                    if ($ue) {
                        $user->addUe($ue);
                    }
                }
            }

            $entityManager->persist($user);
            $entityManager->flush();

            return new JsonResponse(['message' => 'Utilisateur enregistré avec succès.']);
        }

        $ues = $ueRepository->findAll();

        return $this->render('admin/admin.html.twig', [
            'user_sp' => $user,
            'ues_sp' => $ues,
        ]);
    }

    #[Route('/admin/delete/user/{id}', name: 'delete_user', methods: ['DELETE'])]
    public function deleteUser($id): JsonResponse
    {
        $user = $this->userRepository->find($id);

        if ($user) {
            $this->entityManager->remove($user);
            $this->entityManager->flush();
            return $this->json(['success' => true]);
        }

        return $this->json(['success' => false, 'message' => 'Utilisateur non trouvé']);
    }

    #[Route('/admin/delete/ue/{id}', name: 'delete_ue', methods: ['DELETE'])]
    public function deleteUe($id): JsonResponse
    {
        $ue = $this->ueRepository->find($id);

        if ($ue) {
            $this->entityManager->remove($ue);
            $this->entityManager->flush();
            return $this->json(['success' => true]);
        }

        return $this->json(['success' => false, 'message' => 'Unité d\'enseignement non trouvée']);
    }
}