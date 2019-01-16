<div align="center">
  
<h3>DOMAIN AVAILABILITY CHECKER</h3>
 
<form action="" method="post">
<table>
<tr>
<td>Enter domain</td>
<td> : <input type="text" name="domain_name"></td>
<td>
<select name="suffix">
<option value=".com">.com</option>
<option value=".in">.in</option>
<option value=".co.in">.co.in</option>
<option value=".net">.net</option>
<option value=".org">.org</option>
<option value=".biz">.biz</option>
<option value=".info">.info</option>
<option value=".mobi">.mobi</option>
<option value=".ws">.ws</option>
<option value=".co.id">.co.id</option>
<option value=".or.id">.or.id</option>
<option value=".go.id">.go.id</option>
<option value=".sch.id">.sch.id</option>
<option value=".ac.id">.ac.id</option>
<option value=".mil.id">.mil.id</option>
<option value=".web.id">.web.id</option>
<option value=".tv">.tv</option>
<option value=".cn">.cn</option>
<option value=".cc">.cc</option>
<option value=".rs">.rs</option>
<option value=".me">.me</option>
</select>
 
</td>
<tr>
<td align="right" colspan="3"><input type="submit" name="search" value="SEARCH"></td>
</tr>
</tr>
</table>
</form>

<?php
 
if(isset($_POST['search'])) {
 
 if (!empty($_POST['domain_name'])){
 $name_domain = trim($_POST['domain_name']).$_POST['suffix'];
 $result = @dns_get_record($name_domain, DNS_ALL);
 if(empty($result)){
 echo "<H2 style='color:green;' >Domain $name_domain is available.</H2>";
 
 }else{
 echo "<H2 style='color:red;'>Domain $name_domain is taken.</H2>";
 function whois($name_domain, $server) {
 
   if ($connection = fsockopen ($server, 43)) {
     fputs($connection, $name_domain . "\r\n");
  $output ="";
     while(!feof($connection)) {
       $output .= fgets($connection,128);
     }
 
     fclose($connection);
     $back = nl2br($output);
   }
 
 return $back;
}
 
 

$server = 'whois.crsnic.net';
echo whois($name_domain, $server);
 }
 }
 else {
 echo "<H2 style='color:red;'>Error: domain field can not be empty.</H2>";
 }
}
?>
 </div>