<?php
/*
Plugin Name: AM - Adiciona Rorâima
Plugin URI: https://agenciamillennium.com/
Description: Adiciona Rorâima ao banco do Country State City Dropdown CF7
Version: 1.0.0
Author: Agência Millennium
Author URI: https://agenciamillennium.com/
* Copyright (c) 2023 Agência Millennium, Todos os direitos reservados.
*/


function am_insert_roraima() {
	global $wpdb;
	$tabela_estados = $wpdb->prefix .'state';
	$tabela_cidades = $wpdb->prefix .'city';

	$return = null;

	//insere o estado
	$sql_insere_estados = "INSERT INTO `". $tabela_estados ."` (`id`,`name`,`country_id`)"
	."VALUES (NULL, 'Roraima', '31')";
	$return .= 'Inseriu estado: '. $wpdb->query($sql_insere_estados) .'<br />';
	
	//pega o id do estado cadastrado
	$estado_id = $wpdb->get_results("SELECT id FROM ". $tabela_estados. " WHERE name ='Roraima' LIMIT 1", OBJECT );
	$id_estado = $estado_id[0]->id;
	$return .= 'ID estado inserido: '. $id_estado .'<br />';

	//insere as cidades
	$sql_insere_cidades = "INSERT INTO `". $tabela_cidades ."` (`id`,`name`,`state_id`)"
	."VALUES (NULL, 'Amajari', '". $id_estado ."'), (NULL, 'Alto Alegre', '". $id_estado ."'), (NULL, 'Boa Vista', '". $id_estado ."'), (NULL, 'Bonfim', '". $id_estado ."'), "
	."(NULL, 'Cantá', '". $id_estado ."'), (NULL, 'Caracaraí', '". $id_estado ."'), (NULL, 'Caroebe', '". $id_estado ."'), (NULL, 'Iracema', '". $id_estado ."'), "
	."(NULL, 'Mucajaí', '". $id_estado ."'), (NULL, 'Normandia', '". $id_estado ."'), (NULL, 'Pacaraima', '". $id_estado ."'), (NULL, 'Rorainópolis', '". $id_estado ."'), "
	."(NULL, 'São João da Baliza', '". $id_estado ."'), (NULL, 'São Luiz', '". $id_estado ."'), (NULL, 'Uiramutã', '". $id_estado ."')";
	$return .= 'Inseriru Cidades '. $wpdb->query($sql_insere_cidades);

	return $return;
	//executou já desativa o plugin
	//deactivate_plugins('add-roraima.php' );
}
//add_action( 'activated_plugin', 'am_insert_roraima' );

/*************************************************************
 * menu
 ************************************************************/
function am_pipefy_menu() {
	add_menu_page('AM', 'AM ADD Roraima','manage_options','am-add-roraima','am_add_contents','dashicons-block-default',8);
}
add_action( 'admin_menu', 'am_pipefy_menu' );

function am_add_contents() {
	include('am-add-page.php');
}