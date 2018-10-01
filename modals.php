<?php
ini_set('memory_limit', '2048M');
header('Content-type: text/json');
header('Content-type: application/json; charset=utf-8');
include "connection.php";
session_start();
$sModalID = $_GET['modal_id'];
$brojsobe;
$jmbagStudenta;
switch($sModalID)
{
  case 'soba':
  $sQuery=" SELECT dom.id,
          dom.jmbag,
          dom.room_number, 
          student.first_name, 
          student.last_name, 
          soba.room_floor, 
          soba.room_category 
          FROM dom 
          LEFT JOIN student ON student.jmbag = dom.jmbag 
          LEFT JOIN soba ON soba.room_number = dom.room_number WHERE soba.room_number = ".$brojsobe=$_GET['room_no'];
    $oRecord=$oConnection->query($sQuery); 
     $count = $oRecord->rowCount();
    if($count > 0)
    {
      while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
      {
            $oRow['id'];                    
            $jmbag = $oRow['jmbag'];
            $soba_broj =$oRow['room_number'];
            $soba_kat = $oRow['room_floor'];
            $soba_kategorija = $oRow['room_category'];
      }
       echo'<div class="modal-header" style="background-color:#B0C4DE"> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Soba '.$brojsobe=$_GET['room_no'].'</h4>
        </div>
        <div class="modal-body">
          <form>    
          <div >
            <label for="jmbag"><b>Studenti u sobi: </b></label><br>';
            $sQuery=" SELECT dom.jmbag,
                      student.first_name, 
                      student.last_name
                      FROM dom 
                      LEFT JOIN student ON student.jmbag = dom.jmbag 
                      LEFT JOIN soba ON soba.room_number = dom.room_number WHERE soba.room_number = ".$brojsobe=$_GET['room_no'];
                      $oRecord=$oConnection->query($sQuery); 
                      $count = $oRecord->rowCount();
                        while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
                        {
                             echo '<p>'.$oRow['first_name'].' '.$oRow['last_name'].'  <button onclick="DeleteSmjestaj('.$brojsobe.','.$oRow['jmbag'].')" class="btn btn-submit btn-xs"> × </button></p>';
                        };
        echo'</div>
            </form>
              </div>
            <div class="modal-footer" style="background-color: #B0C4DE">
              <button type="button" class="btn btn-submit" data-dismiss="modal">U redu</button>
            </div>';
    }
    else
    { 
          $sQuery=" SELECT * FROM soba  WHERE room_number = ".$brojsobe=$_GET['room_no'];
          $oRecord=$oConnection->query($sQuery);
      while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
      {
            $soba_broj =$oRow['room_number'];
            $soba_kat = $oRow['room_floor'];
            $soba_kategorija = $oRow['room_category'];
      }    
      echo '<div class="modal-header" style="background-color:#B0C4DE" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Soba '.$brojsobe=$_GET['room_no'].'</h4>
            </div>
            <div class="modal-body">
            <form>    
          <div >
            <label for="jmbag"><b>Smjesti studenta: </b></label><br>
                 <select id="jmbag">'; 
                       $sQuery=" SELECT zahtjevi.*, student.*, soba.room_category from zahtjevi LEFT JOIN student ON student.jmbag = zahtjevi.jmbag LEFT JOIN soba ON student.gender = soba.room_category WHERE soba.room_number =".$brojsobe=$_GET['room_no'];
                      $oRecord=$oConnection->query($sQuery); 
                      $count = $oRecord->rowCount();
                        while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
                        {
                             echo '<option value="'.$oRow['jmbag'].'">'.$oRow['first_name'].' '.$oRow['last_name'].' </option>';
                        }; 
        echo'</select>
        <button onclick="UpdateSmjestaj('.$_GET['room_no'].');" type="button" class="btn btn-submit btn-xs" data-dismiss="modal"> + </button>
            </div>
            </form> 
            </div>
          <div class="modal-footer" style="background-color: #B0C4DE">
            <button type="button" class="btn btn-submit" data-dismiss="modal">U redu</button>
          </div>';
    } 
  break;
case 'soba_edit':
  $sQuery=" SELECT dom.id,
          dom.jmbag,
          dom.room_number, 
          student.first_name, 
          student.last_name, 
          soba.room_floor, 
          soba.room_category 
          FROM dom 
          LEFT JOIN student ON student.jmbag = dom.jmbag 
          LEFT JOIN soba ON soba.room_number = dom.room_number WHERE soba.room_number = ".$brojsobe=$_GET['room_no'];
    $oRecord=$oConnection->query($sQuery); 

    $count = $oRecord->rowCount();
 while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
      {
            $oRow['id'];                    
            $jmbag = $oRow['jmbag'];
            $soba_broj =$oRow['room_number'];
            $soba_kat = $oRow['room_floor'];
            $soba_kategorija = $oRow['room_category'];
      }
      if($count == 1)
      {
     
       echo'<div class="modal-header" style="background-color:#B0C4DE">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Soba '.$brojsobe=$_GET['room_no'].'</h4>
        </div>
        <div class="modal-body">
          <form>    
          <div >
            <label><b>Studenti u sobi: </b></label><br>';
            $sQuery=" SELECT dom.jmbag,
                      student.first_name, 
                      student.last_name
                      FROM dom 
                      LEFT JOIN student ON student.jmbag = dom.jmbag 
                      LEFT JOIN soba ON soba.room_number = dom.room_number WHERE soba.room_number = ".$brojsobe=$_GET['room_no'];
                      $oRecord=$oConnection->query($sQuery); 
                      $count = $oRecord->rowCount();
                        while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
                        {
                               echo '<p>'.$oRow['first_name'].' '.$oRow['last_name'].'  <button onclick="DeleteSmjestaj('.$brojsobe.','.$oRow['jmbag'].')" class="btn btn-submit btn-xs"> × </button></p> <br>';
                        };
                        echo '<select id="jmbag">'; 
                       $sQuery=" SELECT zahtjevi.*, student.*, soba.room_category from zahtjevi LEFT JOIN student ON student.jmbag = zahtjevi.jmbag LEFT JOIN soba ON student.gender = soba.room_category WHERE soba.room_number =".$brojsobe=$_GET['room_no'];
                      $oRecord=$oConnection->query($sQuery); 
                      $count = $oRecord->rowCount();
                        while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
                        {
                             echo '<option value="'.$oRow['jmbag'].'">'.$oRow['first_name'].' '.$oRow['last_name'].' </option>';
                        }; 
        echo'</select>
        <button onclick="UpdateSmjestaj('.$_GET['room_no'].');" type="button" class="btn btn-submit btn-xs" data-dismiss="modal"> + </button>
        </div>
            </form>
              </div>
            <div class="modal-footer" style="background-color: #B0C4DE">
              <button type="button" class="btn btn-submit" data-dismiss="modal">U redu</button>
            </div>';
    }
    else if($count == 0)
    { 
      echo '<div class="modal-header" style="background-color:#B0C4DE" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Soba '.$brojsobe=$_GET['room_no'].'</h4>
            </div>
            <div class="modal-body">
              <form>    
                <div>
                  <label><b>Smjestite studenta u sobu: </b></label><br>
                   <select id="jmbag">'; 
                  $sQuery=" SELECT zahtjevi.*, student.*, soba.room_category from zahtjevi LEFT JOIN student ON student.jmbag = zahtjevi.jmbag LEFT JOIN soba ON student.gender = soba.room_category WHERE soba.room_number =".$brojsobe=$_GET['room_no'];
                      $oRecord=$oConnection->query($sQuery); 
                      $count = $oRecord->rowCount();
                        while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
                        {
                             echo '<option id="jmbag" value="'.$oRow['jmbag'].'">'.$oRow['first_name'].' '.$oRow['last_name'].'</option>';
                        };
                        echo' </select> 
            </select> 
            </div>
              </form>
            </div>
          <div class="modal-footer" style="background-color: #B0C4DE">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
            <button onclick="UpdateSmjestaj('.$_GET['room_no'].')" type="button" class="btn btn-submit" data-dismiss="modal">U redu</button>
          </div>';
        }
          else
          {
             echo'<div class="modal-header" style="background-color:#B0C4DE">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Soba '.$brojsobe=$_GET['room_no'].'</h4>
        </div>
        <div class="modal-body">
          <form>    
          <div >
            <label><b>Studenti u sobi: </b></label><br>';
            $sQuery=" SELECT dom.jmbag,
                      student.first_name, 
                      student.last_name
                      FROM dom 
                      LEFT JOIN student ON student.jmbag = dom.jmbag 
                      LEFT JOIN soba ON soba.room_number = dom.room_number WHERE soba.room_number = ".$brojsobe=$_GET['room_no'];
                      $oRecord=$oConnection->query($sQuery); 
                      $count = $oRecord->rowCount();
                        while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
                        {
                             echo '<p>'.$oRow['first_name'].' '.$oRow['last_name'].'  <button onclick="DeleteSmjestaj('.$brojsobe.','.$oRow['jmbag'].')" class="btn btn-submit btn-xs"> × </button></p> <br>';
                        };; 
                         echo' 
            </div>
            </form>
            </div>
          <div class="modal-footer" style="background-color: #B0C4DE">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
            <button onclick="" type="button" class="btn btn-submit" data-dismiss="modal">U redu</button>
          </div>';
    }
  break;
  case 'student':
  $sQuery=" SELECT dom.id,
          dom.jmbag,
          dom.room_number, 
          student.first_name, 
          student.last_name, 
          soba.room_floor, 
          soba.room_category 
          FROM dom 
          LEFT JOIN student ON student.jmbag = dom.jmbag 
          LEFT JOIN soba ON soba.room_number = dom.room_number WHERE student.jmbag = ".$jmbagStudenta=$_GET['jmbag'];
    $oRecord=$oConnection->query($sQuery); 
    $count = $oRecord->rowCount();
     if($count > 0)
        {          
             while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
             {      
                 $oRow['id'];                    
                 $jmbag = $oRow['jmbag'];
                 $studentIme = $oRow['first_name'];
                 $studentPrezime = $oRow['last_name'];
                 $soba_broj =$oRow['room_number'];
             } 
            echo '<div class="modal-header" style="background-color:#B0C4DE" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">'.$studentIme.' '.$studentPrezime.' </h4>
            </div>
            <div class="modal-body">
              <form>    
                <div>
                  <label><b>Smješten u sobu: </b></label> 
                  <input type="text" value="'.$soba_broj.'" disabled><button onclick="DeleteSmjestaj('.$soba_broj.','.$_GET['jmbag'].')" class="btn btn-submit btn-sm"> × </button></input>
                </div>
              </form>
            </div>
        <div class="modal-footer" style="background-color: #B0C4DE">
          <button type="button" class="btn btn-submit" data-dismiss="modal">U redu</button>
        </div>'; 
       }    
    else
    {     
          $sQuery=" SELECT * FROM student  WHERE jmbag = ".$jmbagStudenta=$_GET['jmbag'];
          $oRecord=$oConnection->query($sQuery);
          while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
          {                 
              $studentIme = $oRow['first_name'];
              $studentPrezime = $oRow['last_name'];
              $studentSpol=$oRow['gender'];
          } 
         echo '<div class="modal-header" style="background-color:#B0C4DE" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">'.$studentIme.' '.$studentPrezime.' </h4>
            </div>
            <div class="modal-body">
              <form>    
                <div>
                  <label><b>Smjesti studenta u sobu: </b></label> 
                  <select id="select_number">';
                    $sQuery=" SELECT student.*, soba.room_category, soba.room_number FROM student, soba WHERE student.jmbag =    
                    ".$jmbagStudenta=$_GET['jmbag']." AND soba.room_category = student.gender AND soba.free_bed <> 0";
                    $oRecord=$oConnection->query($sQuery);
                    while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
                    {                 
                        echo '<option  value="'.$oRow['room_number'].'">'.$oRow['room_number'].'</option>';
                    };
                  echo '
                  </select>
                </div>
              </form>
            </div>
          <div class="modal-footer" style="background-color: #B0C4DE">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
            <button onclick="NewSmještaj('.$_GET['jmbag'].')" type="button" class="btn btn-submit" data-dismiss="modal">U redu</button>
          </div>';
    }      
  break;
  case 'student_search':
   $sQuery=" SELECT dom.id,
          dom.jmbag,
          dom.room_number, 
          student.first_name, 
          student.last_name, 
          soba.room_floor, 
          soba.room_category 
          FROM dom 
          LEFT JOIN student ON student.jmbag = dom.jmbag 
          LEFT JOIN soba ON soba.room_number = dom.room_number WHERE student.jmbag = ".$jmbagStudenta=$_GET['jmbag'];
    $oRecord=$oConnection->query($sQuery); 
    $count = $oRecord->rowCount();
     if($count > 0)
        {          
             while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
             {      
                 $oRow['id'];                    
                 $jmbag = $oRow['jmbag'];
                 $studentIme = $oRow['first_name'];
                 $studentPrezime = $oRow['last_name'];
                 $soba_broj =$oRow['room_number'];
                 $soba_kat = $oRow['room_floor'];
             } 
            echo '<div class="modal-header" style="background-color:#B0C4DE" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pozdrav, '.$studentIme.' '.$studentPrezime.' </h4>
            </div>
            <div class="modal-body">
              <form>    
                <div>
                  <label><b>Tvoja soba je '.$soba_broj.'. ('.$soba_kat.')</b></label>                   
                </div>
                <div>
                  <p>Nisi zadovoljan sobom? Ne sviđa ti se cimer? Nema problema, pošalji nam novi zahtjev!</p>
                  <button type="button" class="btn btn-submit btn-xs" onclick="NewZahtjev('.$_GET['jmbag'].')"><i class="fa fa-fw fa-key"></i></button>                   
                </div>
              </form>
            </div>
        <div class="modal-footer" style="background-color: #B0C4DE">
          <p>Za sve informacije obrati se našoj voditeljici.</p>
          <button type="button" class="btn btn-submit" data-dismiss="modal">U redu</button>
        </div>'; 
       }    
       else
       {
         $sQuery=" SELECT * FROM student  WHERE jmbag = ".$jmbagStudenta=$_GET['jmbag'];
          $oRecord=$oConnection->query($sQuery);
          $count = $oRecord->rowCount();
            if($count > 0)
            {
              while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
              {                 
                  $studentIme = $oRow['first_name'];
                  $studentPrezime = $oRow['last_name'];
                  $studentSpol=$oRow['gender'];
              }     
              echo '<div class="modal-header" style="background-color:#B0C4DE" >
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Pozdrav, '.$studentIme.' '.$studentPrezime.' </h4>
                </div>
                <div class="modal-body">
                  <form>    
                    <div>
                      <label><b>Nažalost, tvoju savršenu sobu još nismo pronašli. No, naša voditeljica radi na tome. </b></label>                   
                    </div>
                  </form>
                </div>
            <div class="modal-footer" style="background-color: #B0C4DE">
              <p>Za sve informacije obrati se našoj voditeljici.</p>
              <button type="button" class="btn btn-submit" data-dismiss="modal">U redu</button>
            </div>';
          } 
          else
          {
             echo '<div class="modal-header" style="background-color:#B0C4DE" >
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Pozdrav! </h4>
                </div>
                <div class="modal-body">
                  <form>    
                    <div>
                      <label><b>Vidimo da nisi registrirani student, popuni našu prijavnicu koja se nalazi na linku ispod tražilice i uljepšaj si studentske dane. </b></label>  
                      <p>P.S.: Provjeri da li je upisan ispravan jmbag.</p>                 
                    </div>
                  </form>
                </div>
            <div class="modal-footer" style="background-color: #B0C4DE">
              <p>Za sve informacije obrati se našoj voditeljici.</p>
              <button type="button" class="btn btn-submit" data-dismiss="modal">U redu</button>
            </div>';
          }

       }
  break;
  case 'student_zahtjev':
  $sQuery=" SELECT dom.id,
          dom.jmbag,
          dom.room_number, 
          student.first_name, 
          student.last_name, 
          soba.room_floor, 
          soba.room_category 
          FROM dom 
          LEFT JOIN student ON student.jmbag = dom.jmbag 
          LEFT JOIN soba ON soba.room_number = dom.room_number WHERE student.jmbag = ".$jmbagStudenta=$_GET['jmbag'];
    $oRecord=$oConnection->query($sQuery); 
    $count = $oRecord->rowCount();
     if($count > 0)
        {          
             while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
             {      
                 $oRow['id'];                    
                 $jmbag = $oRow['jmbag'];
                 $studentIme = $oRow['first_name'];
                 $studentPrezime = $oRow['last_name'];
                 $soba_broj =$oRow['room_number'];
             } 
            echo '<div class="modal-header" style="background-color:#B0C4DE" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">'.$studentIme.' '.$studentPrezime.' </h4>
          <p>*Zahtjev za novom sobom.</p>
            </div>
            <div class="modal-body">
              <form>    
                <div>
                  <label><b>Smješten u sobu: '.$soba_broj.'</b></label><br> 
                   <label><b>Nova soba :</b></label> 
                  <select id="select_room">';
                    $sQuery=" SELECT student.*, soba.room_category, soba.room_number FROM student, soba WHERE student.jmbag =    
                    ".$jmbagStudenta=$_GET['jmbag']." AND soba.room_category = student.gender AND soba.free_bed <> 0";
                    $oRecord=$oConnection->query($sQuery);
                    while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
                    {                 
                        echo '<option  value="'.$oRow['room_number'].'">'.$oRow['room_number'].'</option>';
                    };
                  echo '
                  </select>
                </div>
              </form>
            </div>
        <div class="modal-footer" style="background-color: #B0C4DE">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
          <button onclick="UpdateSmjestajNew('.$_GET['jmbag'].','.$soba_broj.'); UpdateSmjestajUp('.$_GET['jmbag'].'); " type="button" class="btn btn-submit" data-dismiss="modal">Spremi Promjene</button>
        </div>'; 
       }    
    else
    {     
          $sQuery=" SELECT * FROM student  WHERE jmbag = ".$jmbagStudenta=$_GET['jmbag'];
          $oRecord=$oConnection->query($sQuery);
          while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
          {                 
              $studentIme = $oRow['first_name'];
              $studentPrezime = $oRow['last_name'];
              $studentSpol=$oRow['gender'];
          } 
         echo '<div class="modal-header" style="background-color:#B0C4DE" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">'.$studentIme.' '.$studentPrezime.' </h4>
            </div>
            <div class="modal-body">
              <form>    
                <div>
                  <label><b>Smjesti studenta u sobu: </b></label> 
                  <select id="select_number">';
                    $sQuery=" SELECT student.*, soba.room_category, soba.room_number FROM student, soba WHERE student.jmbag =    
                    ".$jmbagStudenta=$_GET['jmbag']." AND soba.room_category = student.gender AND soba.free_bed <> 0";
                    $oRecord=$oConnection->query($sQuery);
                    while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
                    {                 
                        echo '<option  value="'.$oRow['room_number'].'">'.$oRow['room_number'].'</option>';
                    };
                  echo '
                  </select>
                </div>
              </form>
            </div>
          <div class="modal-footer" style="background-color: #B0C4DE">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
            <button onclick="NewSmještaj('.$_GET['jmbag'].')" type="button" class="btn btn-submit" data-dismiss="modal">U redu</button>
          </div>';
    }      
  break;
}
?>