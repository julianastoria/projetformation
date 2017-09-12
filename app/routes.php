<?php
	
	$w_routes = array(
		//Default Routes
		['GET'		, '/'					, 'Default#home', 'home'],
		['GET|POST'	, '/contact'			, 'Default#contact', 'contact'],
		['GET'		, '/a_propos'			, 'Default#a_propos', 'a_propos'],
		['GET'		, '/mentions_legales'	,'Default#mentions_legales','mentions_legales'],


		//Users Routes 
		['GET|POST'	, '/connexion'			, 'Users#signin', 'user_signin'],
		['GET|POST'	, '/inscription'		, 'Users#signup', 'user_signup'],
		['GET'		, '/deconnexion'		, 'Users#logout', 'logout'],
		['GET|POST'	, '/mdp_perdu'			, 'Users#lost_pwd', 'lost_pwd'],
		['GET|POST'	, '/reinitilation_mdp/[a:token]', 'Users#reset_pwd', 'reset_pwd'],
		['GET'		, '/profile'			, 'Users#profile', 'profile'],

		//Doctors Routes
		['GET'		, '/medecins'				, 'Doctors#index', 'doctors_index'],
		//['GET'		, '/medecins/[a:type]/liste', 'Doctors#list', 'doctors_list'],
		['GET'		, '/medecin/[i:id]/details'	, 'Doctors#read', 'doctor_details'],
		['GET|POST'	, '/medecin/create'			, 'Doctors#create', 'doctor_create'],
		['GET|POST'	, '/medecin/[i:id]/edit'	, 'Doctors#update', 'doctor_update'],
		['GET|POST'		, '/medecin/[i:id]/delete'	, 'Doctors#delete', 'doctor_delete'],
		//DoctorsNotes Routes
		['GET|POST'	, '/medecin/note/[i:id]/add'	, 'DoctorNotes#create', 'create_doctor_note'],
		['GET|POST'	, '/medecin/note/[i:id]/edit'	, 'DoctorNotes#update', 'edit_doctor_note'],
		['GET'		, '/medecin/note/[i:id]/delete'	, 'DoctorNotes#delete', 'delete_doctor_note'],

		//Institutions Routes
		['GET'		, '/etablissements'				, 'Institutions#index', 'institutions_index'],
		//['GET'		, '/etablissements/[a:type]/liste'	, 'Institutions#list', 'institutions_list'],
		['GET'		, '/etablissement/[i:id]/details'	, 'Institutions#read', 'institution_details'],
		['GET|POST'	, '/etablissement/create'			, 'Institutions#create', 'institution_create'],
		['GET|POST'	, '/etablissement/[i:id]/edit'		, 'Institutions#update', 'institution_update'],
		['GET'		, '/etablissement/[i:id]/delete'	, 'Institutions#delete', 'institution_delete'],
		//InstitutionNotes Routes
		['GET|POST'	, '/etablissement/note/[i:id]/add', 'InstitutionNotes#create', 'create_institution_note'],
		['GET|POST'	, '/etablissement/note/[i:id]/edit', 'InstitutionNotes#update', 'edit_institution_note'],
		['GET'		, '/etablissement/note/[i:id]/delete', 'InstitutionNotes#delete', 'delete_institution_note'],

		// AJAX - Département Route
		['GET'		, '/ajax/departement', 'Doctors#ajaxDepartement', 'ajax_departement']
		
	);