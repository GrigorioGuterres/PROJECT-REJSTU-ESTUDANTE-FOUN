<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbarsideleft = array(
		array(
			'path' => 'home', 
			'label' => 'DASHBOARD', 
			'icon' => '<i class="material-icons ">dashboard</i>'
		),
		
		array(
			'path' => 'menu7', 
			'label' => 'MASTER INPUT', 
			'icon' => '<i class="material-icons ">input</i>',
'submenu' => array(
		array(
			'path' => 'tb_municipiu', 
			'label' => 'DADUS MUNICIPIU', 
			'icon' => '<i class="material-icons ">input</i>'
		),
		
		array(
			'path' => 'tb_postu', 
			'label' => 'DADUS POSTU', 
			'icon' => '<i class="material-icons ">input</i>'
		),
		
		array(
			'path' => 'suko', 
			'label' => 'DADUS SUKO', 
			'icon' => '<i class="material-icons ">input</i>'
		),
		
		array(
			'path' => 'tb_aldeia', 
			'label' => 'DADUS ALDEIA', 
			'icon' => '<i class="material-icons ">input</i>'
		)
	)
		),
		
		array(
			'path' => 'menu8', 
			'label' => 'PROSSESU DADUS', 
			'icon' => '<i class="material-icons ">list</i>',
'submenu' => array(
		array(
			'path' => 'tb_estudante', 
			'label' => 'REJISTU ESUDANTE', 
			'icon' => '<i class="material-icons ">person</i>'
		)
	)
		),
		
		array(
			'path' => 'menu9', 
			'label' => 'OUTPUT', 
			'icon' => '<i class="material-icons ">attach_file</i>',
'submenu' => array(
		array(
			'path' => 'reesudan', 
			'label' => 'RELATORIO GERAL', 
			'icon' => '<i class="material-icons ">attach_file</i>'
		),
		
		array(
			'path' => 'remunicp', 
			'label' => 'RELAROTIU MUNICIPIU', 
			'icon' => '<i class="material-icons ">attach_file</i>'
		),
		
		array(
			'path' => 'resuko', 
			'label' => 'RELATORIU SUKU', 
			'icon' => '<i class="material-icons ">attach_file</i>'
		),
		
		array(
			'path' => 'repost', 
			'label' => 'RELATORIO POSTU', 
			'icon' => '<i class="material-icons ">attach_file</i>'
		),
		
		array(
			'path' => 'realdeia', 
			'label' => 'RELATORIO ALDEIA', 
			'icon' => '<i class="material-icons ">attach_file</i>'
		)
	)
		)
	);
		
			public static $navbartopleft = array(
		array(
			'path' => 'tb_user', 
			'label' => 'admin', 
			'icon' => '<i class="material-icons mi-xxlg">flag</i>'
		)
	);
		
	
	
			public static $sexo = array(
		array(
			"value" => "Mane", 
			"label" => "Mane", 
		),
		array(
			"value" => "Feto", 
			"label" => "Feto", 
		),);
		
			public static $account_status = array(
		array(
			"value" => "Active", 
			"label" => "Active", 
		),
		array(
			"value" => "Pending", 
			"label" => "Pending", 
		),
		array(
			"value" => "Blocked", 
			"label" => "Blocked", 
		),);
		
}