<div class="header">
	<div id="left">
	<img src="../shared/img/savant_logo_small.png" align="left" />
	</div>
    <?php if (session_started()) { ?>
    <div align="right">
     <table align=right width=300 height=100 cellpadding=3 cellspacing=2 	background="../shared/img/user_header.png" bgcolor="ffffff"> 
     <tr> 
<td width="120">
<div class='headerimg'>
<center>
<img src="../shared/img/user_photo_example.png" align="center" />
</center>
</div>
</td>
<td width="160">

<font size=3 face="arial,verdana" color="#ffffff">
<center>  
Bem Vindo <?php echo " ".$_SESSION['usuario.nome'].""?>! 
</center>
</font>
<div class='headerlink'>
<ul>
<a href="#">Meus Dados</a>
</ul>
</div>

</td>
</tr>  
</table>
    </div>
    <?php }?>
	<div id="right"></div>
</div>

