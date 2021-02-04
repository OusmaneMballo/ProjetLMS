<?php
/* Smarty version 3.1.30, created on 2021-02-03 13:17:29
  from "C:\xampp\htdocs\Projects\lmssamanemvc\src\view\welcome\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_601a9459be6265_02459750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0603a52260e09025161f73b115593838629e8329' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projects\\lmssamanemvc\\src\\view\\welcome\\index.html',
      1 => 1612354647,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:src/view/layout/body_layout.html' => 1,
    'file:src/view/layout/footer_layout.html' => 1,
  ),
),false)) {
function content_601a9459be6265_02459750 (Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php $_smarty_tpl->_subTemplateRender("file:src/view/layout/body_layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<h1>
			My Layout
		</h1>
		<h1>
			Lean Management System
		</h1>
		<h1>
			Simplon P3
		</h1>
	<?php $_smarty_tpl->_subTemplateRender("file:src/view/layout/footer_layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<!--
		<div class="nav navbar navbar-default navbar-fixed-top">
			<ul class="nav navbar-nav">

				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
">Accueil</a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Test/index">Menu test page </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Test/getID/1">Menu test get id page </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Test/liste">Menu test list page </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Upload/index">upload file </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
PdfGenerator/generate">Samane Generate pdf file </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
ExcelGenerator/generate">Samane Generate excel file </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
ExcelGenerator/read">Samane read excel file </a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Email/sendMail">Samane Mailing </a></li>
			</ul>
		</div>
		<img src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/image/logo.jpg" class="resize" />
		
		<div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:160px;">
			<div class="panel panel-info">
				<div class="panel-heading">BIENVENUE A VOTRE MODELE MVC</div>
				<div class="panel-body">
					<div class="alert alert-success" style="font-size:18px; text-align:justify;">
							Merci, l'équipe samanemvc vous remercie :) : 
							je vous ai préparé un CRUD qui marche. Lisez la documentation.
							<br/>Et surtout noubliez pas de configurer votre base de données : ou? Dans le dossier config
							puis éditez le fichier database.php. Mettez à on l'etat de la base! Bon code!!!!  :)
					</div>
					<div id="design_js">MODELE DEVELOPPE PAR Ngor SECK ! <h1>Version 1.9.3 Doctrine ORM</h1></div>
				</div>
			</div>
		</div>
	</body>
</html>-->
<?php }
}
