<form action="" type="submit">
    <select id="select" name="onderdeel">
        <?php 
       
        $sth = $pdo->prepare('SELECT * FROM `onderdelen`');
        $sth ->execute();
        while ($row = $sth->fetch()) {

            $onderdeel_nr = $row['Omschrijving'];
            echo $row['Omschrijving'];

            $parameters = array(':id_apparaat' => 1,
                                ':id_onderdeel' => $onderdeel_nr);
            $sth1 = $pdo->prepare('SELECT * onderdeelapparaat WHERE Apparaten_ID = :id_apparaat AND Onderdelen_ID = :id_onderdeel');
            $sth1 ->execute($parameters);
            while ($row1 = $sth1->fetch($parameters)) {
               if ($onderdeel_nr == $row1['Onderdelen_ID']) {
                 echo '<option value="">gevonden</option>';
               }
               else {
                   echo '<option value="">niet gevonden</option>';
               }
            }
            echo '<option value="'. $row['ID']. '">' . $row['Naam'] .'</option>';
        }
        ?>
        
    </select>
    <input type="submit" name="toevoegen" value="Toevoegen">
</form>