<?php /* Smarty version 2.6.9, created on 2010-01-29 08:41:40
         compiled from merchant.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formtool_init', 'merchant.tpl', 8, false),array('function', 'cycle', 'merchant.tpl', 20, false),array('function', 'editor_get', 'merchant.tpl', 29, false),array('function', 'manytomany', 'merchant.tpl', 43, false),array('function', 'formtool_move', 'merchant.tpl', 56, false),array('function', 'formtool_moveall', 'merchant.tpl', 59, false),)), $this); ?>
<HTML>
<HEAD>
<LINK rel="stylesheet" href="/styles/default.css">
</HEAD>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./includes/logged_top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo smarty_function_formtool_init(array('src' => "/jscript/formtool.js"), $this);?>


<?php if ($_GET['MerchantID'] == ""): ?>
	<DIV CLASS="Title">Available Merchants</DIV>
	<TABLE Class="ContentBox" width="500">
		<TR><TD CLASS="ContentBox">
			Select a merchant from the list below or <A HREF="merchant.php?MerchantID=0" CLASS="ContentLink">create a new one</A><P>
			<TABLE CLASS="DataBox">
				<TH CLASS="DataBox">&nbsp;</TH>
				<TH CLASS="DataBox">Merchantp Name</TH>
				<?php $_from = $this->_tpl_vars['merchant']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
					<TR>
						<TD CLASS="DataRow<?php echo smarty_function_cycle(array('values' => 'A,B','advance' => false), $this);?>
"><A HREF="<?php echo $this->_tpl_vars['self']; ?>
?MerchantID=<?php echo $this->_tpl_vars['data']['MerchantID']; ?>
" CLASS="ContentLink">Edit</A></TD>
						<TD CLASS="DataRow<?php echo smarty_function_cycle(array('values' => 'A,B','advance' => true), $this);?>
"><?php echo $this->_tpl_vars['data']['Name']; ?>
</TD>
					</TR>
				<?php endforeach; endif; unset($_from); ?>
			</TABLE><P>
			Text are here describing this editor and what it is for. This area is editable by the administrator so it may contain things like rules, etc.
		</TD></TR>
	</TABLE>
<?php else: ?>
	<?php if ($_GET['MerchantID'] > 0):  echo smarty_function_editor_get(array('table' => 'merchant','column' => 'MerchantID','value' => $_GET['MerchantID'],'return' => 'merchantdata'), $this); endif; ?>
	<DIV CLASS="Title" STYLE="width: 500px;">Editing a Merchant<DIV STYLE="float: right;vertical-align: bottom;"><A HREF="merchant.php" CLASS="ContentLink">Back to listing</A></DIV></DIV>

	<TABLE Class="ContentBox" width="500">
		<TR><TD CLASS="ContentBox">
			<FORM ACTION="merchant.php?MerchantID=<?php echo $_GET['MerchantID']; ?>
" METHOD="POST">
				<INPUT TYPE=HIDDEN NAME=MerchantID VALUE="<?php echo $_GET['MerchantID']; ?>
">
				<INPUT TYPE=HIDDEN NAME=save VALUE=y>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./includes/ed_section.tpl", 'smarty_include_vars' => array('section_data' => $this->_tpl_vars['section_data'],'editdata' => $this->_tpl_vars['merchantdata'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<P>
				<INPUT TYPE=SUBMIT NAME=SUBMIT VALUE="Save this Merchant">
		</TD></TR>
	</TABLE><P>

	<?php echo smarty_function_manytomany(array('cor_table' => 'merchantdata','parent_pk' => 'MerchantID','parent_fk' => 'MerchantID','parent_table' => 'merchant','child_pk' => 'ItemID','child_fk' => 'ItemID','child_name' => 'Name','child_table' => 'items_base','current' => $_GET['MerchantID'],'all' => 'all_data','selected' => 'selected_data'), $this);?>


	<DIV CLASS="Title">Assign Items to this Merchant</DIV>
	<TABLE BORDER=0>
		<TR><TD STYLE="padding: 10px;">
			All Items<BR>
			<SELECT NAME=All[] SIZE=10>
				<?php $_from = $this->_tpl_vars['all_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sdata']):
?>
					<OPTION VALUE="<?php echo $this->_tpl_vars['sdata']['ItemID']; ?>
"><?php echo $this->_tpl_vars['sdata']['Name']; ?>
</OPTION>
				<?php endforeach; endif; unset($_from); ?>
			</SELECT>
			<INPUT TYPE="HIDDEN" NAME="All_save" VALUE="<?php $_from = $this->_tpl_vars['all_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['saveloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['saveloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sdata']):
        $this->_foreach['saveloop']['iteration']++;
 echo $this->_tpl_vars['sdata']['ItemID'];  if (! ($this->_foreach['saveloop']['iteration'] == $this->_foreach['saveloop']['total'])): ?>,<?php endif;  endforeach; endif; unset($_from); ?>">
		</TD><TD STYLE="padding: 10px;">
			<?php echo smarty_function_formtool_move(array('style' => "width: 50px; margin-top: 5px;",'all' => true,'from' => "All[]",'to' => "Selected[]",'button_text' => "&gt&gt;",'save_from' => 'All_save','save_to' => 'Selected_save'), $this);?>
<br>
			<?php echo smarty_function_formtool_move(array('style' => "width: 50px; margin-top: 5px;",'from' => "All[]",'to' => "Selected[]",'button_text' => "&gt;",'save_from' => 'All_save','save_to' => 'Selected_save'), $this);?>
<br>
			<?php echo smarty_function_formtool_move(array('style' => "width: 50px; margin-top: 5px;",'from' => "Selected[]",'to' => "All[]",'button_text' => "&lt;",'save_from' => 'Selected_save','save_to' => 'All_save'), $this);?>
<br>
			<?php echo smarty_function_formtool_moveall(array('style' => "width: 50px; margin-top: 5px;",'from' => "Selected[]",'to' => "All[]",'button_text' => "&lt&lt;",'save_from' => 'Selected_save','save_to' => 'All_save'), $this);?>
<BR>
		</TD><TD STYLE="padding: 10px;">
			Selected Items<BR>
			<SELECT NAME=Selected[] SIZE=10>
				<?php $_from = $this->_tpl_vars['selected_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sdata']):
?>
					<OPTION VALUE="<?php echo $this->_tpl_vars['sdata']['ItemID']; ?>
"><?php echo $this->_tpl_vars['sdata']['Name']; ?>
</OPTION>
				<?php endforeach; endif; unset($_from); ?>
			</SELECT>
			<INPUT TYPE="HIDDEN" NAME="Selected_save" VALUE="<?php $_from = $this->_tpl_vars['selected_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['saveloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['saveloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sdata']):
        $this->_foreach['saveloop']['iteration']++;
 echo $this->_tpl_vars['sdata']['ItemID'];  if (! ($this->_foreach['saveloop']['iteration'] == $this->_foreach['saveloop']['total'])): ?>,<?php endif;  endforeach; endif; unset($_from); ?>">
		</TD></TR>
	</TABLE>

	<DIV STYLE="TEXT-ALIGN: RIGHT;"><INPUT TYPE=SUBMIT NAME=SUBMIT VALUE="Save this Merchant"></DIV>

	</FORM>
<?php endif; ?>