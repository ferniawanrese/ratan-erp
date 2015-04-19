  
<!-- Begin Wrapper -->
<div id="wrapper">
  <div class="wrapper-top"></div>
  <div class="wrapper-mid">
    <!-- Begin Paper -->
    <div id="paper">
      <div class="paper-top"></div>
      <div id="paper-mid">
        <div class="entry">
          <!-- Begin Image -->
          <img class="portrait" src="<?php echo base_url($this->core->get_im($data_detail[0]['employee_photo'],100,100));?>" alt="John Smith" />
          <!-- End Image -->
          <!-- Begin Personal Information -->
          <div class="self">
            <h1 class="name"><?php echo $data_detail[0]['employee_name'];?><br />
              <span><?php echo $data_detail[0]['job_name'];?></span></h1>
            <ul>
              <li class="ad"><?php echo $data_detail[0]['employee_address'];?></li>
              <li class="mail"><?php echo $data_detail[0]['employee_email'];?> </li>
              <li class="tel"><?php echo $data_detail[0]['employee_mobilephone'];?> </li> 
			  <li class="tel"><?php echo $data_detail[0]['employee_phone'];?> </li> 
            </ul>
          </div>
          <!-- End Personal Information -->
          <!-- Begin Social -->
          <div class="social">
            <ul>
              <li><a class='north' href="#" title="Download .pdf"><img src="images/icn-save.jpg" alt="Download the pdf version" /></a></li>
              <li><a class='north' href="javascript:window.print()" title="Print"><img src="images/icn-print.jpg" alt="" /></a></li>
              <li><a class='north' id="contact" href="contact/index.html" title="Contact Me"><img src="images/icn-contact.jpg" alt="" /></a></li>
              <li><a class='north' href="#" title="Follow me on Twitter"><img src="images/icn-twitter.jpg" alt="" /></a></li>
              <li><a class='north' href="#" title="My Facebook Profile"><img src="images/icn-facebook.jpg" alt="" /></a></li>
            </ul>
          </div>
          <!-- End Social -->
        </div>
        <!-- Begin 1st Row -->
        <div class="entry">
          <h2>OBJECTIVE</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dignissim viverra nibh sed varius. Proin bibendum nunc in sem ultrices posuere. Aliquam ut aliquam lacus.</p>
        </div>
        <!-- End 1st Row -->
        <!-- Begin 2nd Row -->
        <div class="entry">
          <h2>EDUCATION</h2>
          <div class="content">
            <h3>Sep 2005 - Feb 2007</h3>
            <p>Academy of Art University, London <br />
              <em>Master in Communication Design</em></p>
          </div>
          <div class="content">
            <h3>Sep 2001 - Jun 2005</h3>
            <p>University of Art &amp; Design, New York <br />
              <em>Bachelor of Science in Graphic Design</em></p>
          </div>
        </div>
        <!-- End 2nd Row -->
        <!-- Begin 3rd Row -->
        <div class="entry">
          <h2>EXPERIENCE</h2>
          <div class="content">
            <h3>May 2009 - Feb 2010</h3>
            <p>Agency Creative, London <br />
              <em>Senior Web Designer</em></p>
            <ul class="info">
              <li>Vestibulum eu ante massa, sed rhoncus velit.</li>
              <li>Pellentesque at lectus in <a href="#">libero dapibus</a> cursus. Sed arcu ipsum, varius at ultricies acuro, tincidunt iaculis diam.</li>
            </ul>
          </div>
          <div class="content">
            <h3>Jun 2007 - May 2009</h3>
            <p>Junior Web Designer <br />
              <em>Bachelor of Science in Graphic Design</em></p>
            <ul class="info">
              <li>Sed fermentum sollicitudin interdum. Etiam imperdiet sapien in dolor rhoncus a semper tortor posuere. </li>
              <li>Pellentesque at lectus in libero dapibus cursus. Sed arcu ipsum, varius at ultricies acuro, tincidunt iaculis diam.</li>
            </ul>
          </div>
        </div>
        <!-- End 3rd Row -->
        <!-- Begin 4th Row -->
        <div class="entry">
          <h2>SKILLS</h2>
          <div class="content">
            <h3>Software Knowledge</h3>
            <ul class="skills">
              <li>Photoshop</li>
              <li>Illustrator</li>
              <li>InDesign</li>
              <li>Flash</li>
              <li>Fireworks</li>
              <li>Dreamweaver</li>
              <li>After Effects</li>
              <li>Cinema 4D</li>
              <li>Maya</li>
            </ul>
          </div>
          <div class="content">
            <h3>Languages</h3>
            <ul class="skills">
              <li>CSS/XHTML</li>
              <li>PHP</li>
              <li>JavaScript</li>
              <li>Ruby on Rails</li>
              <li>ActionScript</li>
              <li>C++</li>
            </ul>
          </div>
        </div>
        <!-- End 4th Row -->
         <!-- Begin 5th Row -->
        <div class="entry">
        <h2>WORKS</h2>
        	<ul class="works">
        		<li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/2.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/3.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/2.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/3.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        	</ul>
        </div>
        <!-- Begin 5th Row -->
      </div>
      <div class="clear"></div>
      <div class="paper-bottom"></div>
    </div>
    <!-- End Paper -->
  </div>
  <div class="wrapper-bottom"></div>
</div>
<div id="message"><a href="#top" id="top-link">Go to Top</a></div>
 
<style>

body {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	background-color: white;
	font-size:13pt;
	line-height: 17pt;
}

.clear {
	clear:both;
}

a, a:hover, a:visited, a:active {
	color:#709399;
	text-decoration: none;
}

#wrapper, .wrapper-mid {
	background: none;
}

.wrapper-top, .wrapper-bottom  {
	display:none;
}

#paper {
	width:820px;
	margin:0 auto;
}

.paper-top, .paper-bottom {
	display:none;
}

#paper-mid {
	width:820px;
	margin:0 auto;
	background-color:#FFF;
	display:block;
	padding:0;
	overflow: hidden;
	padding-bottom:75px;
	padding-top:7px;
}

.entry {
	width:820px;
	display: block;
	padding-top:55px;
	clear: both;
}

h1 {
	width:500px;
	font-size:42pt;
	color:#315a60;
	margin-bottom:0;
}

h1 span {
	font-size:21pt;
	display:block;
	margin-left:15px;
	margin-top:20px;
	color:#315a60;
}

h2 {
	width:180px;
	height: 23px;
	text-align: right;
	float:left;
	padding:0;
	margin:0;
	clear:both;
	font-size:22pt;
	margin-bottom:-12px;
	color:#315a60;
}

p {
	width:600px;
	margin-left:40px;
	float:right;
}

ul.list {
	clear: both;
	padding:0;
	margin:0;
	overflow: hidden;
}

ul.list li {
	display:block;
	float:right;
	padding-top:32px;
}


h3 {
	width:180px;
	text-align: right;
	float:left;
	padding:0;
	clear:both;
	font-size: 13pt;
	color:black;
}

em {
	font-family: Georgia, "Times New Roman", serif;
	font-style: italic;
	color:#999;
	font-size:12pt;
	display: block;
	padding-top:0;
}

ul.info {
	float:right;
	width:600px;
	margin-left:40px;
	background: none;
	list-style: square;
	
}

ul.info li {
	margin:0;
	padding:0;
	float:left;
	display: block;
	width:600px;
	padding-left:0;
	background-position: 0 .5em;
	margin-top:12px;
	list-style-type: square;
}

ul.skills {
	margin:0;
	padding:0;
	float:right;
	width:600px;
	margin-left:40px;
	margin-top:-6px;
	background: none;
	list-style: square;
}

ul.skills li {
	margin:0;
	padding:0;
	float:left;
	width:176px;
	padding-left:0;
	background-position: 0 .5em;
	margin-top:6px;
}

img.portrait {
	border:1px solid #000;
	padding:10px;	
}

.self {
	width:500px;
	float:left;
	padding-top:11px;
	margin-left:0;
	margin-bottom:15px;
	margin-left:38px;
}

.self ul {
	padding-top: 10px;
}

.self ul li {
	background-repeat: no-repeat;
	padding-left:0;
	background-position: 0 .1em;
	height:25px;
	display:block;
	margin-top:-2px;
}

.social {
	display:none;
}

/* ELEMENTS */
/* ----------------------------------------- */

table {
	width: 590px;
	margin-left:40px;
	float:right;
	border-collapse: collapse;
	border-bottom:1px dashed #999;
	border-top:1px dashed #999;
}

table td {
	padding: 10px;
	padding-top:0;
	border-right:1px dashed #999;
}

table td:hover {
	background-color: #f2f2f2;
}

table th {
	padding: 10px;
	padding-top:0;
	color:#709399;
	text-align: left;
	border-right:1px dashed #999;
}

table td.center {
	text-align: center;
}

table td.last {
	background: none;
}

table th.center {
	text-align: center;
}

table th.last {
	background: none;
}

table tr {
	border-left:1px dashed #999;
	border-top:1px dashed #999;
}

table tr.caption {
	border-left:1px dashed #999;
}

blockquote {
	border-left:3px solid #709399;
	padding-left:8px;
	margin-top:20px;
	width:585px;
	margin-left:40px;
	float:right;
}

pre {
	width:500px;
	margin-left:40px;
	float:right;
}

abbr, acronym {
	border-bottom:1px dashed #709399;
}

strong {
	font-weight: bold;
}

small {
	font-size:70%;
}

big {
	font-size:1.2em;
}

/* GO TO TOP */
/* ----------------------------------------- */

#message {
	display:none;
}

.works {
	display:none;
}


</style>
