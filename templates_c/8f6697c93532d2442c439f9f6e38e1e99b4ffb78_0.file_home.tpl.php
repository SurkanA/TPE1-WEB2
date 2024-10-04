<?php
/* Smarty version 5.4.1, created on 2024-10-05 01:51:40
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_67007f8c8216d3_40877902',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f6697c93532d2442c439f9f6e38e1e99b4ffb78' => 
    array (
      0 => 'home.tpl',
      1 => 1728085898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_67007f8c8216d3_40877902 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web 2\\TPE1-WEB2\\templates';
$_smarty_tpl->renderSubTemplate('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h1>Equipos</h1>

<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('equipos'), 'equipo');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('equipo')->value) {
$foreach0DoElse = false;
?>

<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?php echo $_smarty_tpl->getValue('equipo')->nombre_equipo;?>
</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

    </div>
  </div>
    

<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php $_smarty_tpl->renderSubTemplate('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
