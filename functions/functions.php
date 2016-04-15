<?php
function input_type($p1, $p2, $id, $typ, $nam, $val, $tex){
	echo "<label for=".$id.">".$tex."</label>";
	echo $p1;
	echo "<input id=".$id." type=".$typ." name=".$nam." value=".$val.">";
	echo $p2;
}

function input_text($par1, $par2, $teext, $message, $add) {		
		echo $par1;
        echo $teext;
        echo $par2;
		echo $par1;
        echo "<textarea type=".$message.">".$add."</textarea>";
        echo $par2;        
}
/*function links($link){

echo "<p><a href='http://".$link."'>".$link."</a></p>";
}*/

/*function select_text($par1, $par2, $nam, $text, $text1, $text2, $text3, $text4, $text5, $text6) {
		
		echo $par1;
        echo "<select name=".$nam.">
			  <option value=1>".$text."</option>
			  <option value=2>".$text1."</option>
			  <option value=3>".$text2."</option>
			  <option value=4>".$text3."</option>
			  <option value=5>".$text4."</option>
			  <option value=6>".$text5."</option>
			  <option value=7>".$text6."</option>		
			  </select>";
		echo $par2;
}*/