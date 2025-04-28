-- Insertion des cours
INSERT INTO `ue` (`code`, `title`, `description`, `image`) VALUES
('MT3F', 'Mathématiques', 'Cours de mathématiques avancées', 'back1.png'),
('IF2B', 'Informatique', 'Introduction à la programmation', 'back2.png'),
('PS22', 'Physique', 'Cours de physique fondamentale', 'back3.png'),
('CM1A', 'Chimie', 'Chimie générale', 'back1.png'),
('LC00', 'Chinois', 'Introduction au chinois', 'back2.png'),
('LO21', 'Algorithmique', 'Cours sur les algorithmes', 'back3.png'),
('SO09', 'Santé Sécurité', 'Santé sécurité au travail', 'back1.png'),
('TN1B', 'Dessin industriel', 'Introduction au dessin industriel', 'back2.png'),
('GE00', 'Économie', 'Principes de base de l’économie', 'back3.png');

-- Insertion des utilisateurs
INSERT INTO `users` (`email`, `password`, `role`, `first_name`, `last_name`, `created_at`) VALUES
('admin@example.com', 'password123', 'admin', 'Toto', 'Otot', NOW()),
('professor@example.com', 'password123', 'professor', 'John', 'Snow', NOW()),
('student@example.com', 'password123', 'student', 'Jean', 'Pierre', NOW());

-- Cours de l'eleve
INSERT INTO `users_ue` (`users_id`, `ue_id`) VALUES
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 6);

-- Cours du prof
INSERT INTO `users_ue` (`users_id`, `ue_id`) VALUES
(2, 1),
(2, 2);