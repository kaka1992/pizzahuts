<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2013-06-09 10:21:10, compiled from D:\xampp\htdocs\test/template/home/pizza_tableTwoEnd.htm */ ?>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>

<div id="pg">
<table align="center" width="840">
<tr>
<td align="centert">
<?php if  ($number == 1||$datanum==0) { ?>
<?php echo '<span class="disabled">&laquo; Previous</span>&nbsp;&nbsp;'; ?>
<?php } else { ?>
<?php echo '&laquo;<a href="index.php?c=index&a=run&number='.($number-1).'&type='.$type.'&fname='.$fname.'">'.' Previous&nbsp;&nbsp;'; ?>
<?php } ?> 
<?php for  ($i=1; $i<=$datanum; $i++) { ?>

<?php echo '&nbsp;&nbsp;<a '; ?>
<?php if  ($number == $i) { ?>
<?php echo 'class="current" '; ?>
<?php } ?>
<?php echo 'href="index.php?c=index&a=run&number='.$i.'&type='.$type.'&fname='.$fname.'">'.$i.'</a>'; ?>

<?php } ?>
<?php if  ($number == $datanum || $datanum==0) { ?>
<?php echo '&nbsp;&nbsp;<span class="disabled">Next &raquo;</span>'; ?>
<?php } else { ?>
<?php echo '&nbsp;&nbsp;<a href="index.php?c=index&a=run&number='.($number+1).'&type='.$type.'&fname='.$fname.'">Next &raquo;</a>'; ?>
<?php } ?> 
</td>
</tr>
</table>                

</div>