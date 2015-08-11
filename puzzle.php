<html lang='en'>
    <head>
        <title>Jquery Drag and Drop Puzzle</title>
        <script src="jquery-1.7.2.js" type="text/javascript"></script>
        <script src="ui/jquery.ui.core.js" type="text/javascript"></script>
        <script src="ui/jquery.ui.widget.js" type="text/javascript"></script>
        <script src="ui/jquery.ui.mouse.js" type="text/javascript"></script>
        <script src="ui/jquery.ui.sortable.js" type="text/javascript"></script>
        <link rel="stylesheet" href="demos.css">
        <style>
		
			body { background-color: black;}
            #sortable { list-style-type: none; margin: 10px auto; padding: 0; }
            #sortable li { float: left;}       
            .msg_text{text-align: center; padding: 20px; font-size: 30px; text-shadow: 1px 1px 1px rgb(21, 23, 28); color: #B2BEB5;}
			#table td a{ font-size: 2em; list-style-type:none; text-decoration: none; color: #B2BEB5;}
        </style>
        <script type="text/javascript">
            $(function() {
                $("#sortable").sortable({
                    opacity: 0.6,
                    cursor: 'move',
                    update: function() {
                        var winningString = //"oezh,rfwb,lsea,vkxl,ihrx,ilsc,eyen,mwgc,derv,logi,bwdk,scmz";
						//"vbfe,liuz,luyw,mlyh,pxnb,apxa,kxjb,nzwn,klut,blga,mpzf,nyqo";
						"jzpm,lkyp,mgdv,qbpw,zhcf,zuku,yvro,difl,gdzi,zjgh,mtln,edbl";
                        var currentString = '';
                        
                        $('#sortable li').each(function(){
                            var imageId = $(this).attr("id");
                            currentString += imageId.replace("recordArr_", "")+",";
                        });
                        
                        currentString = currentString.substr(0,(currentString.length) -1);
                        
                        if(currentString == winningString){
                            alert("You  Won");
                        }
                        console.log(currentString);
                    }
                });

            });
        </script>
    </head>

    <body>
	<table id="table" width="100" height="100"><tr><td valign="top">
<?php for($i = 1; $i <= 3; $i++) echo "<a href=\"split.php?level=$i\">Level $i</a><br/>\n"; ?>
</td></tr></table>
	<div class="msg_text">Drag and Drop Images and Solve the Puzzle</div>
        <?php
            $image_names =// "ilsc,scmz,lsea,derv,logi,eyen,vkxl,ihrx,mwgc,bwdk,rfwb,oezh";
			//"apxa,nzwn,pxnb,kxjb,luyw,klut,liuz,vbfe,nyqo,mpzf,mlyh,blga";
            "gdzi,mtln,yvro,zhcf,difl,qbpw,edbl,jzpm,mgdv,zuku,lkyp,zjgh";
			$images = explode(',', $image_names);
            shuffle($images);
            
            $new_width = "800";
            $new_height= "600";
	    $split_size= "200";

            echo "<ul id='sortable' style='width:" . $new_width . "px;height:" . $new_height . "px;'>";
            
            foreach ($images as $key => $image_name) {
                echo "<li class='ui-state-default' id='recordArr_$image_name' style='border:none;width:" . $split_size . "px;height:" . $split_size . "px;'>
                            <img src='images/$image_name.jpg' /></li>";
            }
            
            echo "</ul>";
        ?>


    </body>
</html>

