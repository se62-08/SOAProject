<?php
session_start();
//username password ที่ใช้เป็นตัวกลางในการเข้าเซิฟเวอร์
$username = "กำหนดเอง"; // username นนทรี
$password = "กำหนดเอง"; // password นนทรี
$ldap_error = array(
	"ERR-000: OK",
	"ERR-001: Bind error",
	"ERR-002: Anonymous search failed",
	"ERR-003: User unknown",
	"ERR-004: More than one such user",
	"ERR-005: bind failed. user not authenticated."
);

$ldap_uid			= "";
$ldap_first_name_eng = "";
$ldap_last_name_eng = "";
$ldap_first_name	= "";
$ldap_last_name		= "";
$ldap_email			= "";
$ldap_gender		= "";
$ldap_Job			= "";
$ldap_department	= "";
$ldap_faculty		= "";
$ldap_major_id		= "";
$ldap_campus		= "";		//รหัสวิทยาเขต ดังนี้ บางเขน=B , กำแพงแสน=K , ศรีราชา=S , สกลนคร=C
$ldap_idcode		= "";		//รหัสประจำตัวนิสิต


function user_authen($username, $ldappass, $filter1 = "")
{
	$host1   = "ldap.ku.ac.th";
	$host2   = "ldap2.ku.ac.th";
	$host3   = "ldap3.ku.ac.th";
	$base_dn = "dc=ku,dc=ac,dc=th";

	$ldapserver = ldap_connect($host1);
	if (!$ldapserver) {
		$ldapserver = ldap_connect($host2);
		if (!$ldapserver) {
			$ldapserver = ldap_connect($host3);
		}
	}

	$bind = ldap_bind($ldapserver);
	if (!$bind) {
		return (1);
	}

	$filter = "uid=" . $filter1;
	//$filter = "(&(department-id=K0816)(campus=K))"; //ค้นหาตามid ภาควิชา
	$result = ldap_search($ldapserver, $base_dn, $filter);
	$info = ldap_get_entries($ldapserver, $result);

	$user_dn = $info[0]["dn"];
	$bind = @ldap_bind($ldapserver, $user_dn, $ldappass);


	/*
	require_once 'lib/configdb.inc';
	require_once 'adodb5/adodb.inc.php';
	require_once 'adodb5/drivers/adodb-mysql.inc.php';
	require_once 'lib/connectdb.inc.php';

	$rs = $conn->Execute("select * from users where username ='$username'");


	if ($rs->RecordCount() <= 0) {

				
		 $conn->Execute("INSERT INTO users(username) VALUES('$username')"); //เพิ่มบัญชีผู้ใช้
		 
			 $rs2 = $conn->Execute("select * from users where username = '$username'"); 
			    $_SESSION['userid'] = $rs->fields['user_id'];
			  
			if($info[0]["position"][0]=="")  // นิสิต
			{
				
				   $rs = $conn->Execute("select * from student where name = '".$info[0]["first-name"][0]."' and surname = '".$info[0]["last-name"][0]."'");  
			
				  //ค้นหา userid
				   	
				   if($rs->RecordCount()<=0) //ตรวจสอบข้อมูลของนิสิต
				   {
				
				       $rs = $conn->Execute("select * from department where dept_code = '".$info[0]["major-id"][0]."'");  //ค้นหา dept_id
					   if($rs->RecordCount()<=0) //ไม่พบชื่อภาควิชาในระบบ
					   {
						    return(6);
					    }
					   $conn->Execute("INSERT INTO student(user_id,dept_id,name,surname,e_mail,student_code) VALUES('".$rs2->fields["user_id"]."','".$rs->fields["dept_id"]."','".$info[0]["first-name"][0]."','".$info[0]["last-name"][0]."','".$info[0]["mail"][0]."','".$info[0]["idcode"][0]."')");
				   }
				   else
				   {
					    $conn->Execute("UPDATE student SET  user_id='".$rs2->fields["user_id"]."' WHERE student_id ='".$rs->fields["student_id"]."'"); // อัพเดทข้อมูล userid
				   }
				   	  $_SESSION['author'] = "student";
		              $_SESSION['name'] = $info[0]["first-name"][0];
	 			      $_SESSION['surname'] =$info[0]["last-name"][0];
			
					   
				
			}
			else if($info[0]["position"][0]!=""&&$info[0]["advisor-id"][0]!="") // อาจารย์
			{
				
				
				 $rs = $conn->Execute("select * from teacher where name = '".$info[0]["first-name"][0]."' and surname = '".$info[0]["last-name"][0]."'");  
				 
				if($rs->RecordCount()<=0) //ตรวจสอบข้อมูลของอาจารย์
				{
					   $conn->Execute("INSERT INTO student(user_id,name,surname,e_mail,teacher_code) VALUES('".$rs2->fields["user_id"]."','".$info[0]["first-name"][0]."','".$info[0]["last-name"][0]."','".$info[0]["mail"][0]."','".$info[0]["advisor-id"][0]."')");
				 }
				 else
				 {
					    $conn->Execute("UPDATE teacher SET  user_id='".$rs2->fields["user_id"]."' WHERE teacher_id ='".$rs->fields["teacher_id"]."'"); // อัพเดทข้อมูล userid
			     }
				   	  $_SESSION['author'] = "teacher";
		             $_SESSION['name'] = $info[0]["first-name"][0];
	 			      $_SESSION['surname'] =$info[0]["last-name"][0];
				 
				 
						
				
			}
     			
	} else {
		$_SESSION['userid'] = $rs->fields['user_id'];
		$_SESSION['data_type'] = '';

		$rs_teacher = $conn->Execute("select * from teacher where user_id = '" . $rs->fields['user_id'] . "'");  //ค้นหา dept_id
		$rs_student = $conn->Execute("select * from student where user_id = '" . $rs->fields['user_id'] . "'");
		$rs_managertable =  $conn->Execute("select * from managertable where user_id = '" . $rs->fields['user_id'] . "'");
		$rs_admin =  $conn->Execute("select * from admin where user_id = '" . $rs->fields['user_id'] . "'");
		$count_type = 0;
		if ($rs_student->RecordCount() > 0)  // นิสิต
		{
			$_SESSION['data_type'] =  $_SESSION['data_type'] . ",student";
			$_SESSION['author'] = "student";
			$_SESSION['name'] = $info[0]["first-name"][0];
			$_SESSION['surname'] = $info[0]["last-name"][0];

			$count_type++;
		}
		if ($rs_teacher->RecordCount() > 0)  // อาจารย์
		{
			$_SESSION['data_type'] =  $_SESSION['data_type'] . ",teacher";

			$_SESSION['author'] = "teacher";
			$_SESSION['name'] = $info[0]["first-name"][0];
			$_SESSION['surname'] = $info[0]["last-name"][0];
			$count_type++;
		}
		if ($rs_managertable->RecordCount() > 0) {
			$_SESSION['data_type'] =  $_SESSION['data_type'] . "," . $rs_managertable->fields["types"];
			$_SESSION['author'] = $rs_managertable->fields["types"];
			$_SESSION['name'] = $info[0]["first-name"][0];
			$_SESSION['surname'] = $info[0]["last-name"][0];

			$rs_dept = $conn->Execute("select * from department where  dept_id ='" . $rs_managertable->fields["dept_id"] . "'");
			$_SESSION['d'] = $rs_dept->fields['dept_name'];
			$_SESSION['d_id'] = $rs_dept->fields['dept_id'];
			$count_type++;
		}
		if ($rs_admin->RecordCount() > 0) {
			$_SESSION['data_type'] =  $_SESSION['data_type'] . ",admin";
			$_SESSION['author'] = "admin";
			$_SESSION['name'] = $info[0]["first-name"][0];
			$_SESSION['surname'] = $info[0]["last-name"][0];
			$count_type++;
		}
	}
	 $GLOBALS["ldap_uid"]		= $info[0]["uid"][0];
        $GLOBALS["ldap_first_name_eng"]	= $info[0]["givenname"][0] ;
		$GLOBALS["ldap_last_name_eng"]	=$info[0]["sn"][0];
        $GLOBALS["ldap_first_name"]	= $info[0]["first-name"][0];
		$GLOBALS["ldap_last_name"]	= $info[0]["last-name"][0];
        $GLOBALS["ldap_email"]		= $info[0]["mail"][0];
        $GLOBALS["ldap_gender"]		= $info[0]["gender"][0];
        $GLOBALS["ldap_major_id"]   = $info[0]["major-id"][0];
		$GLOBALS["ldap_idcode"]		= $info[0]["idcode"][0];
		
        $GLOBALS["ldap_faculty"]	= $info[0]["faculty"][0];
        $GLOBALS["ldap_campus"]		= $info[0]["campus"][0];
        $GLOBALS["ldap_Job"]		= $info[0]["jobdescription"][0];

	$_SESSION['count_type'] =  $count_type;
	ldap_close($ldapserver);*/

	return $info;
}


/*Array ( [count] => 1 [0] => 
Array ( 
	[uid] => Array ( [count] => 1 [0] => fengncn ) [0] => uid 
	[uidnumber] => Array ( [count] => 1 [0] => 68614 ) [1] => uidnumber 
	[telephonenumber] => Array ( [count] => 1 [0] => 085-0905609 ) [2] => telephonenumber 
	[gidnumber] => Array ( [count] => 1 [0] => 21 ) [3] => gidnumber 
	[creatorsname] => Array ( [count] => 1 [0] => cn=directory manager ) [4] => creatorsname 
	[createtimestamp] => Array ( [count] => 1 [0] => 20100424124538Z ) [5] => createtimestamp 
	[objectclass] => Array ( [count] => 10 [0] => account [1] => posixAccount [2] => top [3] => shadowAccount [4] => person [5] => organizationalPerson [6] => inetorgperson [7] => kuinfo [8] => dspswuser [9] => mailrecipient ) [6] => objectclass 
	[mail] => Array ( [count] => 4 [0] => fengncn@ku.ac.th [1] => fengncn@nontri.ku.ac.th [2] => nutchanat.s@ku.ac.th [3] => nutchanat.s@nontri.ku.ac.th ) [7] => mail 
	[google-mail] => Array ( [count] => 1 [0] => nutchanat.s@ku.th ) [8] => google-mail 
	[campus] => Array ( [count] => 1 [0] => K ) [9] => campus 
	[gender] => Array ( [count] => 1 [0] => F ) [10] => gender 
	[jobtype] => Array ( [count] => 1 [0] => พนักงานมหาวิทยาลัย ) [11] => jobtype 
	[position] => Array ( [count] => 1 [0] => ผู้ช่วยศาสตราจารย์ ) [12] => position 
	[department] => Array ( [count] => 1 [0] => ภาควิชาวิศวกรรมคอมพิวเตอร์ ) [13] => department 
	[department-id] => Array ( [count] => 1 [0] => K0816 ) [14] => department-id 
	[faculty] => Array ( [count] => 1 [0] => คณะวิศวกรรมศาสตร์ กำแพงแสน ) [15] => faculty 
	[faculty-id] => Array ( [count] => 1 [0] => K08 ) [16] => faculty-id 
	[birthday] => Array ( [count] => 1 [0] => 30/01/2527 ) [17] => birthday 
	[thaiprename] => Array ( [count] => 1 [0] => นางสาว ) [18] => thaiprename 
	[givenname] => Array ( [count] => 1 [0] => Nutchanat ) [19] => givenname 
	[first-name] => Array ( [count] => 1 [0] => นุชนาฎ ) [20] => first-name 
	[last-name] => Array ( [count] => 1 [0] => สัตยากวี ) [21] => last-name 
	[thainame] => Array ( [count] => 1 [0] => นุชนาฎ สัตยากวี ) [22] => thainame 
	[gecos] => Array ( [count] => 1 [0] => Nutchanat Sattayakawee ) [23] => gecos 
	[advisor-id] => Array ( [count] => 1 [0] => E9044 ) [24] => advisor-id 
	[type-person] => Array ( [count] => 1 [0] => 1 ) [25] => type-person 
	[cn] => Array ( [count] => 1 [0] => Nutchanat SATTAYAKAWEE ) [26] => cn 
	[sn] => Array ( [count] => 1 [0] => SATTAYAKAWEE ) [27] => sn 
	[mail-other] => Array ( [count] => 1 [0] => s.nutchanat@gmail.com ) [28] => mail-other 
	[modifiersname] => Array ( [count] => 1 [0] => cn=directory manager ) [29] => modifiersname 
	[modifytimestamp] => Array ( [count] => 1 [0] => 20170810020813Z ) [30] => modifytimestamp 
	[count] => 31 
	[dn] => uid=fengncn,ou=Personnel,ou=feng,ou=BKN,dc=ku,dc=ac,dc=th ) )
	*/
?>
<form action="ldap.php" method="POST" name="loginform">

	<td width="122" height="36">
		<div>Username : </div>
	</td>
	<td width="174">
		<div>
			<input name="username" type="text" size="20" />
		</div>
	</td>

	<input name="submit" type="submit" value="Login" />



</form>
<?php
if (isset($_POST['username'])) {
	$info = (user_authen($username, $password, $_POST['username'])); // id
	if ($info[0]["type-person"][0] == "3") {
		//นิสิต
		echo "uid=" . $info[0]["uid"][0] . "</br>";
		echo "givenname=" . $info[0]["givenname"][0] . "</br>";
		echo "sn=" . $info[0]["sn"][0] . "</br>";
		echo "first-name=" . $info[0]["first-name"][0] . "</br>";
		echo "last-name=" . $info[0]["last-name"][0] . "</br>";
		echo "gender=" . $info[0]["gender"][0] . "</br>";
		echo "mail=" . $info[0]["google-mail"][0] . "</br>";
		echo "faculty=" . $info[0]["faculty"][0] . "</br>";
		echo "campus=" . $info[0]["campus"][0] . "</br>";
		echo "idcode=" . $info[0]["idcode"][0] . "</br>";
		echo "birthday=" . $info[0]["birthday"][0] . "</br>";
		echo "advisor-id=" . $info[0]["advisor-id"][0] . "</br>";
		echo "major-id=" . $info[0]["major-id"][0] . "</br>";
		echo "type-person=" . $info[0]["type-person"][0] . "</br>";
		echo "objectclass=" . $info[0]["objectclass"][0] . "</br>";
		echo "position=" . $info[0]["position"][0] . "</br>";
		echo "thaiprename=" . $info[0]["thaiprename"][0] . "</br>";
		echo "thainame=" . $info[0]["thainame"][0] . "</br>";
	} else if ($info[0]["type-person"][0] == "1") {
		//อาจารย์
		echo "uid=" . $info[0]["uid"][0] . "</br>";
		echo "telephonenumber=" . $info[0]["telephonenumber"][0] . "</br>";
		echo "google-mail=" . $info[0]["google-mail"][0] . "</br>";
		echo "campus=" . $info[0]["campus"][0] . "</br>";
		echo "gender=" . $info[0]["gender"][0] . "</br>";
		echo "jobtype=" . $info[0]["jobtype"][0] . "</br>";
		echo "position=" . $info[0]["position"][0] . "</br>";
		echo "department=" . $info[0]["department"][0] . "</br>";
		echo "department-id=" . $info[0]["department-id"][0] . "</br>";
		echo "faculty=" . $info[0]["faculty"][0] . "</br>";
		echo "faculty-id=" . $info[0]["faculty-id"][0] . "</br>";
		echo "birthday=" . $info[0]["birthday"][0] . "</br>";
		echo "thaiprename=" . $info[0]["thaiprename"][0] . "</br>";
		echo "first-name=" . $info[0]["first-name"][0] . "</br>";
		echo "last-name=" . $info[0]["last-name"][0] . "</br>";
		echo "thainame=" . $info[0]["thainame"][0] . "</br>";
		echo "gecos=" . $info[0]["gecos"][0] . "</br>";
		echo "advisor-id=" . $info[0]["advisor-id"][0] . "</br>";
		echo "type-person=" . $info[0]["type-person"][0] . "</br>";
		echo "cn=" . $info[0]["cn"][0] . "</br>";
	} else {
		//อื่นๆ
		foreach ($info as $p) {
			echo "uid=" . $p["uid"][0] . "</br>";
			echo "telephonenumber=" . $p["telephonenumber"][0] . "</br>";
			echo "google-mail=" . $p["google-mail"][0] . "</br>";
			echo "campus=" . $p["campus"][0] . "</br>";
			echo "gender=" . $p["gender"][0] . "</br>";
			echo "jobtype=" . $p["jobtype"][0] . "</br>";
			echo "position=" . $p["position"][0] . "</br>";
			echo "department=" . $p["department"][0] . "</br>";
			echo "department-id=" . $p["department-id"][0] . "</br>";
			echo "faculty=" . $p["faculty"][0] . "</br>";
			echo "faculty-id=" . $p["faculty-id"][0] . "</br>";
			echo "birthday=" . $p["birthday"][0] . "</br>";
			echo "thaiprename=" . $p["thaiprename"][0] . "</br>";
			echo "first-name=" . $p["first-name"][0] . "</br>";
			echo "last-name=" . $p["last-name"][0] . "</br>";
			echo "thainame=" . $p["thainame"][0] . "</br>";
			echo "gecos=" . $p["gecos"][0] . "</br>";
			echo "advisor-id=" . $p["advisor-id"][0] . "</br>";
			echo "type-person=" . $p["type-person"][0] . "</br>";
			echo "cn=" . $p["cn"][0] . "</br>";
			echo "</br></br>";
		}
	}
}
