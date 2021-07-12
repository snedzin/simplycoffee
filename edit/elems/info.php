<?php 
	if ($info) {
		echo "<div class=\"alert alert-{$info['status']} alert-dismissible fade show\" role=\"alert\">
				  <strong>Ура!</strong> {$info['text']}
				  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
				    <span aria-hidden=\"true\">&times;</span>
				  </button>
			  </div>

		";
	} 
?>