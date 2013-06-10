<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2013-06-09 10:21:10, compiled from D:\xampp\htdocs\test/template/home/pizza_tableTwoBody.htm */ ?>
        <td width="607"><table width="101%" height="310" border="0" cellspacing="5">
        	<?php $temp=0 ?>
        	<?php for  ($i=1; $i<4; $i++) { ?>
            	<?php echo '<tr>'; ?>
            	<?php for  ($j=1; $j<4; $j++) { ?>
                	<?php echo '<td>'; ?>
                    <?php if  ($temp < $data[1]) { ?>
                        <?php echo '<table width="184" border="0" align="center" cellspacing="5">'; ?>
                        <?php echo '<tr>'; ?>
                          <?php echo '<td width="164"><a href="index.php?c=description&a=run&id='.$data[0][$temp]["id"].'&u='.$username.'"><img src="'.$data[0][$temp]["pic_url"].'" width="172" height="121" alt="sweat" /></a></td>'; ?>
                        <?php echo '</tr>'; ?>
                        <?php echo '<tr>'; ?>
                          <?php echo '<td><table width="139" border="0" cellspacing="5">'; ?>
                            <?php echo '<tr>'; ?>
                              <?php echo '<td width="95" height="21">'.$data[0][$temp]["name"].'</td>'; ?>
                              <?php echo '<td width="25">price:'.$data[0][$temp][price]*$data[0][$temp]["discount"].'</td>'; ?>
                            <?php echo '</tr>'; ?>
                          <?php echo '</table></td>'; ?>
                        <?php echo '</tr>'; ?>
                        <?php echo '<tr align="right">'; ?>
                          <?php echo '<td><input type="button" onclick="add(' ?><?php echo $data[0][$temp]['id'].",'".$data[0][$temp]['name']."',1,".$data[0][$temp]['price'].');" value="order"/></td>'; ?>
                        <?php echo '</tr>'; ?>
                      <?php echo '</table>'; ?>
                      <?php } else { ?>
                      <?php echo '<td>&nbsp;&nbsp;</td>'; ?>
                      <?php } ?> 
                      <?php $temp = $temp + 1; ?>
                <?php echo '</td>'; ?>
				<?php } ?>
                <?php echo '</tr>'; ?>
			<?php } ?>
            <?php $temp=0; ?>
        </table></td>
        <td width="205">&nbsp;</td>