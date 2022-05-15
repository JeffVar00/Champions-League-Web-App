<?php 
/*Basado de: https://github.com/statsconchris/draw.algorithm/blob/main/algorithm_FIFA.php*/
	require_once "../conexiones/conexion.php";
	$sorteo = array();
	$query="SELECT NOMBRE FROM CLUBES";
	$consulta=$mysqli->query($query);
	while($fila=$consulta->fetch_array(MYSQLI_ASSOC)){
		array_push($sorteo, $fila['NOMBRE']);
	}

	$A1 = '0'; $A2 = '0'; $A3 = '0'; $A4 = '0';
    $B1 = '0'; $B2 = '0'; $B3 = '0'; $B4 = '0';
    $C1 = '0'; $C2 = '0'; $C3 = '0'; $C4 = '0';
    $D1 = '0'; $D2 = '0'; $D3 = '0'; $D4 = '0';
    $E1 = '0'; $E2 = '0'; $E3 = '0'; $E4 = '0';
    $F1 = '0'; $F2 = '0'; $F3 = '0'; $F4 = '0';
    $G1 = '0'; $G2 = '0'; $G3 = '0'; $G4 = '0';
    $H1 = '0'; $H2 = '0'; $H3 = '0'; $H4 = '0';
    
    $groupA = array($A1,$A2,$A3,$A4);
    $groupB = array($B1,$B2,$B3,$B4);
    $groupC = array($C1,$C2,$C3,$C4);
    $groupD = array($D1,$D2,$D3,$D4);
    $groupE = array($E1,$E2,$E3,$E4);
    $groupF = array($F1,$F2,$F3,$F4);
    $groupG = array($G1,$G2,$G3,$G4);
    $groupH = array($H1,$H2,$H3,$H4);

 	$bombo1 = array($sorteo[0], $sorteo[1], $sorteo[2], $sorteo[3], $sorteo[4], $sorteo[5], $sorteo[6], $sorteo[7]);
 	$bombo2 = array($sorteo[8], $sorteo[9], $sorteo[10], $sorteo[11], $sorteo[12], $sorteo[13], $sorteo[14], $sorteo[15]);
 	$bombo3 = array($sorteo[16], $sorteo[17], $sorteo[18], $sorteo[19], $sorteo[20], $sorteo[21], $sorteo[22], $sorteo[23]);
 	$bombo4 = array($sorteo[24], $sorteo[25], $sorteo[26], $sorteo[27], $sorteo[28], $sorteo[29], $sorteo[30], $sorteo[31]);

 	shuffle($bombo1);
 	$A1 = $bombo1[0];
 	$B1 = $bombo1[1];
 	$C1 = $bombo1[2];
 	$D1 = $bombo1[3];
 	$E1 = $bombo1[4];
 	$F1 = $bombo1[5];
 	$G1 = $bombo1[6];
 	$H1 = $bombo1[7];


 	shuffle($bombo2);
 	$A2 = $bombo2[0];
 	$B2 = $bombo2[1];
 	$C2 = $bombo2[2];
 	$D2 = $bombo2[3];
 	$E2 = $bombo2[4];
 	$F2 = $bombo2[5];
 	$G2 = $bombo2[6];
 	$H2 = $bombo2[7];

 	shuffle($bombo3);
 	$A3 = $bombo3[0];
 	$B3 = $bombo3[1];
 	$C3 = $bombo3[2];
 	$D3 = $bombo3[3];
 	$E3 = $bombo3[4];
 	$F3 = $bombo3[5];
 	$G3 = $bombo3[6];
 	$H3 = $bombo3[7];

 	shuffle($bombo4);
 	$A4 = $bombo4[0];
 	$B4 = $bombo4[1];
 	$C4 = $bombo4[2];
 	$D4 = $bombo4[3];
 	$E4 = $bombo4[4];
 	$F4 = $bombo4[5];
 	$G4 = $bombo4[6];
 	$H4 = $bombo4[7];

 	    $limpPar="DELETE FROM PARTIDOS";
        $mysqli->query($limpPar);

        /*Grupo A*/
        $aeq1="UPDATE CLUBES SET ID_GRUPO='A', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$A1'";
        $mysqli->query($aeq1);
        $aeq2="UPDATE CLUBES SET ID_GRUPO='A', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$A2'";
        $mysqli->query($aeq2);
        $aeq3="UPDATE CLUBES SET ID_GRUPO='A', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$A3'";
        $mysqli->query($aeq3);
        $aeq4="UPDATE CLUBES SET ID_GRUPO='A', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$A4'";
        $mysqli->query($aeq4);   

        /*Partidos Grupo A*/
        $casa1="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$A1', '$A2', 'A')";
        $casa12="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$A1', '$A3', 'A')";
        $casa13="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$A1', '$A4', 'A')";
        $mysqli->query($casa1);
        $mysqli->query($casa12);
        $mysqli->query($casa13);

        $casa2="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$A2', '$A1', 'A')";
        $casa22="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$A2', '$A3', 'A')";
        $casa23="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$A2', '$A4', 'A')";
        $mysqli->query($casa2);
        $mysqli->query($casa22);
        $mysqli->query($casa23);

        $casa3="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$A3', '$A1', 'A')";
        $casa32="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$A3', '$A2', 'A')";
        $casa33="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$A3', '$A4', 'A')";
        $mysqli->query($casa3);
        $mysqli->query($casa32);
        $mysqli->query($casa33);

        $casa4="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$A4', '$A1', 'A')";
        $casa42="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$A4', '$A2', 'A')";
        $casa43="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$A4', '$A3', 'A')";
        $mysqli->query($casa4);
        $mysqli->query($casa42);
        $mysqli->query($casa43);


        /*Grupo B*/
        $beq1="UPDATE CLUBES SET ID_GRUPO='B', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$B1'";
        $bcon1=$mysqli->query($beq1);
        $beq2="UPDATE CLUBES SET ID_GRUPO='B', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$B2'";
        $bcon2=$mysqli->query($beq2);
        $beq3="UPDATE CLUBES SET ID_GRUPO='B', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$B3'";
        $bcon3=$mysqli->query($beq3);
        $beq4="UPDATE CLUBES SET ID_GRUPO='B', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$B4'";
        $bcon4=$mysqli->query($beq4); 

        /*Partidos Grupo B*/
        $casa1b="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$B1', '$B2', 'B')";
        $casa12b="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$B1', '$B3', 'B')";
        $casa13b="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$B1', '$B4', 'B')";
        $mysqli->query($casa1b);
        $mysqli->query($casa12b);
        $mysqli->query($casa13b);

        $casa2b="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$B2', '$B1', 'B')";
        $casa22b="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$B2', '$B3', 'B')";
        $casa23b="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$B2', '$B4', 'B')";
        $mysqli->query($casa2b);
        $mysqli->query($casa22b);
        $mysqli->query($casa23b);

        $casa3b="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$B3', '$B1', 'B')";
        $casa32b="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$B3', '$B2', 'B')";
        $casa33b="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$B3', '$B4', 'B')";
        $mysqli->query($casa3b);
        $mysqli->query($casa32b);
        $mysqli->query($casa33b);

        $casa4b="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$B4', '$B1', 'B')";
        $casa42b="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$B4', '$B2', 'B')";
        $casa43b="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$B4', '$B3', 'B')";
        $mysqli->query($casa4b);
        $mysqli->query($casa42b);
        $mysqli->query($casa43b);               

        /*Grupo C*/
        $ceq1="UPDATE CLUBES SET ID_GRUPO='C', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$C1'";
        $ccon1=$mysqli->query($ceq1);
        $ceq2="UPDATE CLUBES SET ID_GRUPO='C', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$C2'";
        $ccon2=$mysqli->query($ceq2);
        $ceq3="UPDATE CLUBES SET ID_GRUPO='C', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$C3'";
        $ccon3=$mysqli->query($ceq3);
        $ceq4="UPDATE CLUBES SET ID_GRUPO='C', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$C4'";
        $ccon4=$mysqli->query($ceq4);  

        /*Partidos Grupo C*/
        $casa1c="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$C1', '$C2', 'C')";
        $casa12c="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$C1', '$C3', 'C')";
        $casa13c="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$C1', '$C4', 'C')";
        $mysqli->query($casa1c);
        $mysqli->query($casa12c);
        $mysqli->query($casa13c);

        $casa2c="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$C2', '$C1', 'C')";
        $casa22c="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$C2', '$C3', 'C')";
        $casa23c="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$C2', '$C4', 'C')";
        $mysqli->query($casa2c);
        $mysqli->query($casa22c);
        $mysqli->query($casa23c);

        $casa3c="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$C3', '$C1', 'C')";
        $casa32c="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$C3', '$C2', 'C')";
        $casa33c="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$C3', '$C4', 'C')";
        $mysqli->query($casa3c);
        $mysqli->query($casa32c);
        $mysqli->query($casa33c);

        $casa4c="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$C4', '$C1', 'C')";
        $casa42c="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$C4', '$C2', 'C')";
        $casa43c="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$C4', '$C3', 'C')";
        $mysqli->query($casa4c);
        $mysqli->query($casa42c);
        $mysqli->query($casa43c);                 

        /*Grupo D*/
        $deq1="UPDATE CLUBES SET ID_GRUPO='D', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$D1'";
        $dcon1=$mysqli->query($deq1);
        $deq2="UPDATE CLUBES SET ID_GRUPO='D', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$D2'";
        $dcon2=$mysqli->query($deq2);
        $deq3="UPDATE CLUBES SET ID_GRUPO='D', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$D3'";
        $dcon3=$mysqli->query($deq3);
        $deq4="UPDATE CLUBES SET ID_GRUPO='D', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$D4'";
        $dcon4=$mysqli->query($deq4);    

        /*Partidos Grupo D*/
        $casa1d="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$D1', '$D2', 'D')";
        $casa12d="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$D1', '$D3', 'D')";
        $casa13d="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$D1', '$D4', 'D')";
        $mysqli->query($casa1d);
        $mysqli->query($casa12d);
        $mysqli->query($casa13d);

        $casa2d="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$D2', '$D1', 'D')";
        $casa22d="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$D2', '$D3', 'D')";
        $casa23d="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$D2', '$D4', 'D')";
        $mysqli->query($casa2d);
        $mysqli->query($casa22d);
        $mysqli->query($casa23d);

        $casa3d="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$D3', '$D1', 'D')";
        $casa32d="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$D3', '$D2', 'D')";
        $casa33d="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$D3', '$D4', 'D')";
        $mysqli->query($casa3d);
        $mysqli->query($casa32d);
        $mysqli->query($casa33d);

        $casa4d="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$D4', '$D1', 'D')";
        $casa42d="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$D4', '$D2', 'D')";
        $casa43d="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$D4', '$D3', 'D')";
        $mysqli->query($casa4d);
        $mysqli->query($casa42d);
        $mysqli->query($casa43d);                     

        /*Grupo E*/
        $eeq1="UPDATE CLUBES SET ID_GRUPO='E', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$E1'";
        $econ1=$mysqli->query($eeq1);
        $eeq2="UPDATE CLUBES SET ID_GRUPO='E', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$E2'";
        $econ2=$mysqli->query($eeq2);
        $eeq3="UPDATE CLUBES SET ID_GRUPO='E', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$E3'";
        $econ3=$mysqli->query($eeq3);
        $eeq4="UPDATE CLUBES SET ID_GRUPO='E', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$E4'";
        $econ4=$mysqli->query($eeq4); 

        /*Partidos Grupo E*/
        $casa1e="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$E1', '$E2', 'E')";
        $casa12e="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$E1', '$E3', 'E')";
        $casa13e="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$E1', '$E4', 'E')";
        $mysqli->query($casa1e);
        $mysqli->query($casa12e);
        $mysqli->query($casa13e);

        $casa2e="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$E2', '$E1', 'E')";
        $casa22e="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$E2', '$E3', 'E')";
        $casa23e="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$E2', '$E4', 'E')";
        $mysqli->query($casa2e);
        $mysqli->query($casa22e);
        $mysqli->query($casa23e);

        $casa3e="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$E3', '$E1', 'E')";
        $casa32e="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$E3', '$E2', 'E')";
        $casa33e="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$E3', '$E4', 'E')";
        $mysqli->query($casa3e);
        $mysqli->query($casa32e);
        $mysqli->query($casa33e);

        $casa4e="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$E4', '$E1', 'E')";
        $casa42e="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$E4', '$E2', 'E')";
        $casa43e="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$E4', '$E3', 'E')";
        $mysqli->query($casa4e);
        $mysqli->query($casa42e);
        $mysqli->query($casa43e);                                    

        /*Grupo F*/
        $feq1="UPDATE CLUBES SET ID_GRUPO='F', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$F1'";
        $fcon1=$mysqli->query($feq1);
        $feq2="UPDATE CLUBES SET ID_GRUPO='F', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$F2'";
        $fcon2=$mysqli->query($feq2);
        $feq3="UPDATE CLUBES SET ID_GRUPO='F', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$F3'";
        $fcon3=$mysqli->query($feq3);
        $feq4="UPDATE CLUBES SET ID_GRUPO='F', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$F4'";
        $fcon4=$mysqli->query($feq4); 

        /*Partidos Grupo F*/
        $casa1f="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$F1', '$F2', 'F')";
        $casa12f="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$F1', '$F3', 'F')";
        $casa13f="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$F1', '$F4', 'F')";
        $mysqli->query($casa1f);
        $mysqli->query($casa12f);
        $mysqli->query($casa13f);

        $casa2f="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$F2', '$F1', 'F')";
        $casa22f="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$F2', '$F3', 'F')";
        $casa23f="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$F2', '$F4', 'F')";
        $mysqli->query($casa2f);
        $mysqli->query($casa22f);
        $mysqli->query($casa23f);

        $casa3f="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$F3', '$F1', 'F')";
        $casa32f="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$F3', '$F2', 'F')";
        $casa33f="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$F3', '$F4', 'F')";
        $mysqli->query($casa3f);
        $mysqli->query($casa32f);
        $mysqli->query($casa33f);

        $casa4f="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$F4', '$F1', 'F')";
        $casa42f="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$F4', '$F2', 'F')";
        $casa43f="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$F4', '$F3', 'F')";
        $mysqli->query($casa4f);
        $mysqli->query($casa42f);
        $mysqli->query($casa43f); 

        /*Grupo G*/
        $geq1="UPDATE CLUBES SET ID_GRUPO='G', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$G1'";
        $gcon1=$mysqli->query($geq1);
        $geq2="UPDATE CLUBES SET ID_GRUPO='G', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$G2'";
        $gcon2=$mysqli->query($geq2);
        $geq3="UPDATE CLUBES SET ID_GRUPO='G', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$G3'";
        $gcon3=$mysqli->query($geq3);
        $geq4="UPDATE CLUBES SET ID_GRUPO='G', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$G4'";
        $gcon4=$mysqli->query($geq4);

        /*Partidos Grupo G*/
        $casa1g="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$G1', '$G2', 'G')";
        $casa12g="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$G1', '$G3', 'G')";
        $casa13g="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$G1', '$G4', 'G')";
        $mysqli->query($casa1g);
        $mysqli->query($casa12g);
        $mysqli->query($casa13g);

        $casa2g="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$G2', '$G1', 'G')";
        $casa22g="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$G2', '$G3', 'G')";
        $casa23g="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$G2', '$G4', 'G')";
        $mysqli->query($casa2g);
        $mysqli->query($casa22g);
        $mysqli->query($casa23g);

        $casa3g="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$G3', '$G1', 'G')";
        $casa32g="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$G3', '$G2', 'G')";
        $casa33g="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$G3', '$G4', 'G')";
        $mysqli->query($casa3g);
        $mysqli->query($casa32g);
        $mysqli->query($casa33g);

        $casa4g="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$G4', '$G1', 'G')";
        $casa42g="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$G4', '$G2', 'G')";
        $casa43g="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$G4', '$G3', 'G')";
        $mysqli->query($casa4g);
        $mysqli->query($casa42g);
        $mysqli->query($casa43g);                          

        /*Grupo H*/
        $heq1="UPDATE CLUBES SET ID_GRUPO='H', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$H1'";
        $hcon1=$mysqli->query($heq1);
        $heq2="UPDATE CLUBES SET ID_GRUPO='H', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$H2'";
        $hcon2=$mysqli->query($heq2);
        $heq3="UPDATE CLUBES SET ID_GRUPO='H', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$H3'";
        $hcon3=$mysqli->query($heq3);
        $heq4="UPDATE CLUBES SET ID_GRUPO='H', PJ=0, PG=0, PP=0, PE=0, GF=0, GC=0, DG=0, Pts=0 WHERE NOMBRE='$H4'";
        $hcon4=$mysqli->query($heq4); 

        /*Partidos Grupo H*/
        $casa1h="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$H1', '$H2', 'H')";
        $casa12h="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$H1', '$H3', 'H')";
        $casa13h="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$H1', '$H4', 'H')";
        $mysqli->query($casa1h);
        $mysqli->query($casa12h);
        $mysqli->query($casa13h);

        $casa2h="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$H2', '$H1', 'H')";
        $casa22h="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$H2', '$H3', 'H')";
        $casa23h="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$H2', '$H4', 'H')";
        $mysqli->query($casa2h);
        $mysqli->query($casa22h);
        $mysqli->query($casa23h);

        $casa3h="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$H3', '$H1', 'H')";
        $casa32h="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$H3', '$H2', 'H')";
        $casa33h="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$H3', '$H4', 'H')";
        $mysqli->query($casa3h);
        $mysqli->query($casa32h);
        $mysqli->query($casa33h);

        $casa4h="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$H4', '$H1', 'H')";
        $casa42h="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$H4', '$H2', 'H')";
        $casa43h="INSERT INTO PARTIDOS (CASA, VISITANTE, ID_GRUPO) VALUES('$H4', '$H3', 'H')";
        $mysqli->query($casa4h);
        $mysqli->query($casa42h);
        $mysqli->query($casa43h);                                                     

        header("refresh:0.1;url= ../menu_usuario.php");
?>