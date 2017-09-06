<?php
	
	$w_routes = array(
		//Default Routes
		['GET', '/', 'Default#home', 'home'],
		['GET|POST', '/contact', 'Default#contact', 'contact'],
		['GET', '/a_propos', 'Default#a_propos', 'a_propos'],
		['GET','/mentions_legales','Default#mentions_legales','mentions_legales'],
		//Users Routes 
		['GET|POST', '/signin', 'Users#signin', 'user_signin'],
		['GET|POST', '/signup', 'Users#signup', 'user_signup'],
		['GET', '/logout', 'Users#logout', 'logout'],
		['GET|POST', '/lost_pwd', 'Users#lost_pwd', 'lost_pwd'],
		['GET|POST', '/reset_pwd/[a:token]', 'Users#reset_pwd', 'reset_pwd'],
		['GET', '/profile', 'Users#profile', 'profile'],
		// Doctors Routes
		// /medecin/[a:type]/liste
		['GET', '/medecin/liste', 'Doctors#index', 'doctors_index'],
		['GET', '/medecin/[i:id]/details', 'Doctors#read', 'doctor_details'],
		['GET|POST', '/medecin/create', 'Doctors#create', 'doctor_create'],
		['GET|POST', '/medecin/[i:id]/edit', 'Doctors#update', 'doctor_update'],
		['GET', '/medecin/[i:id]/delete', 'Doctors#delete', 'doctor_delete'],
		//Institutions Routes
		['GET', '/etablissement/[a:type]/liste', 'Institutions#index', 'instutitions_index'],
		['GET', '/etablissement/[i:id]/details', 'Institutions#read', 'instutition_details'],
		['GET|POST', '/etablissement/create', 'Institutions#create', 'instutition_create'],
		['GET|POST', '/etablissement/[i:id]/edit', 'Institutions#update', 'instutition_update'],
		['GET', '/etablissement/[i:id]/delete', 'Institutions#delete', 'instutition_delete'],
		//InstitutionNotes Routes
		['GET|POST', '/etablissement/note/[i:id]/add', 'InstitutionsNotes#create', 'create_institution_note'],
		['GET[POST', '/etablissement/note/[i:id]/edit', 'InstitutionsNotes#update', 'edit_institution_note'],
		['GET', '/etablissement/note/[i:id]/delete', 'InstitutionsNotes#delete', 'delete_institution_note'],
		
		//DoctorsNotes Routes
		['GET|POST', '/medecin/note/[i:id]/add', 'DoctorsNotes#create', 'create_doctor_note'],
		['GET[POST', '/medecin/note/[i:id]/edit', 'DoctorsNotes#update', 'edit_doctor_note'],
		['GET', '/medecin/note/[i:id]/delete', 'DoctorsNotes#delete', 'delete_doctor_note']
	);