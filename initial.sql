USE app;

-- Insert an admin
INSERT INTO admin (id_admin, email, username, password) 
VALUES (1, 'admin@example.com', 'admin_user', 'securepassword');

-- Insert companies
INSERT INTO companies (id_entr_pharm, name, username, password, coordonnees_entre_pharm, id_admin) 
VALUES 
(1, 'PharmaCorp', 'pharmacorp_user', 'pharmapassword', '123 Pharma St.', 1),
(2, 'Health Inc.', 'healthinc_user', 'healthpassword', '456 Health Ave.', 1);

-- Insert partners
INSERT INTO partners (id_partenaire, nom_part, username, password, coordonneees, domaine, id_admin) 
VALUES 
(1, 'PartnerA', 'partnera_user', 'partnerapassword', '789 Partner Rd.', 'DomainA', 1),
(2, 'PartnerB', 'partnerb_user', 'partnerbpassword', '101 Partner Ln.', 'DomainB', 1);

-- Insert women
INSERT INTO women (id_fe_en, nom_complet, username, password, poids_fe, tension_arterielle, niveau_de_fer, date_accouchement, glycemie, date_debut_grossesse, allergies, preferences, antecedents_medicaux) 
VALUES 
(1, 'Jane Doe', 'janedoe', 'password123', 65.0, 120.0, 13.5, '2024-09-10 00:00:00', 5.2, '2024-01-15', 'None', 'Vegetarian', 'No history'),
(2, 'Mary Smith', 'marysmith', 'password456', 70.0, 125.0, 12.0, '2024-10-20 00:00:00', 4.8, '2024-02-01', 'Peanuts', 'Vegan', 'Diabetes');

-- Insert professionals
INSERT INTO professionals (id_pr_sante, nom_pr_sante, username, password, description_pr_sante, specialite, id_admin, id_fe_en) 
VALUES 
(1, 'Dr. John', 'drjohn', 'drjohnpassword', 'OB/GYN Specialist', TRUE, 1, 1),
(2, 'Dr. Emily', 'dremily', 'dremilypassword', 'Nutritionist', FALSE, 1, 2);

-- Insert products
INSERT INTO products (code_prod, nom_prod, type_prod, marque, description_prod, ingredients_prod) 
VALUES 
(1, 'ProductA', 'TypeA', 'BrandA', 'Description for ProductA', 'Ingredient1, Ingredient2'),
(2, 'ProductB', 'TypeB', 'BrandB', 'Description for ProductB', 'Ingredient3, Ingredient4');

-- Insert ingredients
INSERT INTO ingredients (id_ingredient, nom_ingredient) 
VALUES 
(1, 'Ingredient1'),
(2, 'Ingredient2'),
(3, 'Ingredient3'),
(4, 'Ingredient4');

-- Insert medications
INSERT INTO MEDICAMENTS (id_medic, nom_medic, description_medic, id_entr_pharm) 
VALUES 
(1, 'MedicamentA', 'Description for MedicamentA', 1),
(2, 'MedicamentB', 'Description for MedicamentB', 2);

-- Insert meals
INSERT INTO REPAS (id_repas, nom_repas, description, id_fe_en) 
VALUES 
(1, 'Breakfast', 'Healthy breakfast', 1),
(2, 'Lunch', 'Nutritious lunch', 2);

-- Insert meal contents
INSERT INTO CONTENIR (id_repas, id_ingredient) 
VALUES 
(1, 1),
(1, 2),
(2, 3),
(2, 4);

-- Insert publications
INSERT INTO PUBLICATIONS (id_pub, titre_pub, text_pub, id_fe_en) 
VALUES 
(1, 'Pub Title 1', 'Text of the publication 1', 1),
(2, 'Pub Title 2', 'Text of the publication 2', 2);

-- Insert comments
INSERT INTO COMMENTAIRES (id_comment, text_comment, id_fe_en) 
VALUES 
(1, 'This is a comment on publication 1', 1),
(2, 'This is a comment on publication 2', 2);

-- Insert scanner data
INSERT INTO SCANNER (id_fe_en, code_prod) 
VALUES 
(1, 1),
(2, 2);

-- Insert proposals
INSERT INTO PROPOSER (id_medic, id_pr_sante) 
VALUES 
(1, 1),
(2, 2);

-- Insert health reports
INSERT INTO RAPPORT_DE_SANTE (id_rapp, type_de_maladid, description_rapp, id_pr_sante, id_fe_en) 
VALUES 
(1, 'DiseaseA', 'Description of DiseaseA', 1, 1),
(2, 'DiseaseB', 'Description of DiseaseB', 2, 2);
