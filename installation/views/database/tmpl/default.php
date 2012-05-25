<?php
/**
 * @package		Joomla.Installation
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// BEGIN Stackato VCAP Services
$services = getenv("VCAP_SERVICES");
$appinfo = getenv("VCAP_APPLICATION");
$services_json = json_decode($services,true);
$appinfo_json = json_decode($appinfo,true);
$mysql_config = $services_json["mysql-5.1"][0]["credentials"];
if (array_key_exists("users", $appinfo_json))
  $admin = $appinfo_json["users"][0];
else
  $admin = $appinfo_json["group"];
// END Stackato VCAP Services

defined('_JEXEC') or die;
?>
<div id="step">
	<div class="far-right">
<?php if ($this->document->direction == 'ltr') : ?>
		<div class="button1-right"><div class="prev"><a href="index.php?view=license" onclick="return Install.goToPage('license');" rel="prev" title="<?php echo JText::_('JPrevious'); ?>"><?php echo JText::_('JPrevious'); ?></a></div></div>
		<div class="button1-left"><div class="next"><a href="#" onclick="Install.submitform();" rel="next" title="<?php echo JText::_('JNext'); ?>"><?php echo JText::_('JNext'); ?></a></div></div>
<?php elseif ($this->document->direction == 'rtl') : ?>
		<div class="button1-right"><div class="prev"><a href="#" onclick="Install.submitform();" rel="next" title="<?php echo JText::_('JNext'); ?>"><?php echo JText::_('JNext'); ?></a></div></div>
		<div class="button1-left"><div class="next"><a href="index.php?view=license" onclick="return Install.goToPage('license');" rel="prev" title="<?php echo JText::_('JPrevious'); ?>"><?php echo JText::_('JPrevious'); ?></a></div></div>
<?php endif; ?>
	</div>
	<h2><?php echo JText::_('INSTL_DATABASE'); ?></h2>
</div>
<form action="index.php" method="post" id="adminForm" class="form-validate">
	<div id="installer">
		<div class="m">
			<h3><?php echo JText::_('INSTL_DATABASE_TITLE'); ?></h3>
			<div class="install-text">
					<?php echo JText::_('INSTL_DATABASE_DESC'); ?>
			</div>
			<div class="install-body">
				<div class="m">
					<h4 class="title-smenu" title="<?php echo JText::_('Basic'); ?>">
						<?php echo JText::_('INSTL_BASIC_SETTINGS'); ?>
					</h4>
					<div class="section-smenu">
						<table class="content2 db-table">
							<tr>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo $this->form->getLabel('db_type'); ?>
									<br />
									<?php echo $this->form->getInput('db_type'); ?>
								</td>
								<td>
									For Stackato, use: <b>Mysql</b>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo $this->form->getLabel('db_host'); ?>
									<br />
									<?php echo $this->form->getInput('db_host'); ?>
								</td>
								<td>
									For Stackato, use: <b><?php echo $mysql_config["hostname"]; ?></b>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo $this->form->getLabel('db_user'); ?>
									<br />
									<?php echo $this->form->getInput('db_user'); ?>
								</td>
								<td>
									For Stackato, use: <b><?php echo $mysql_config["user"]; ?></b>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo $this->form->getLabel('db_pass'); ?>
									<br />
									<?php echo $this->form->getInput('db_pass'); ?>
								</td>
								<td>
									For Stackato, use: <b><?php echo $mysql_config["password"]; ?></b>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo $this->form->getLabel('db_name'); ?>
									<br />
									<?php echo $this->form->getInput('db_name'); ?>
								</td>
								<td>
									For Stackato, use: <b><?php echo $mysql_config["name"]; ?></b>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo $this->form->getLabel('db_prefix'); ?>
									<br />
									<?php echo $this->form->getInput('db_prefix'); ?>
								</td>
								<td>
									<em>
									<?php echo JText::_('INSTL_DATABASE_PREFIX_DESC'); ?>
									</em>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo $this->form->getLabel('db_old'); ?>
									<br />
									<?php echo $this->form->getInput('db_old'); ?>
								</td>
								<td>
									<em>
									<?php echo JText::_('INSTL_DATABASE_OLD_PROCESS_DESC'); ?>
									</em>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="clr"></div>
		</div>
	</div>
	<input type="hidden" name="task" value="setup.database" />
	<?php echo JHtml::_('form.token'); ?>
</form>
