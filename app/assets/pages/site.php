<div class="container">
  <table class="table table-striped text-center">
    <thead>
      <tr>
        <th scope="col">Nom du site</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $dir = "./";
          if ($dh = opendir($dir))
            {
              while (($file = readdir($dh)) !== false)
              {
                if($file != '.' && $file != '..' && $file != 'index.php' && $file != 'assets')
                  {?>
                    <tr>
                      <td><h5><?= $file ?></h5></td>
                      <td>

                        <?php

                          $folder = scandir($file);

                          $site = scandir('/etc/nginx/conf.d');

                          if(count($folder) <= 2){
                            echo 'Aucun fichier';
                          }elseif(in_array('index.html', $folder) || in_array('index.php', $folder)){
                            echo '<a target="_blank" href="/' . $file . '" class="btn btn-success mr-2">Voir en direct</a>';
                          }elseif(count($folder) > 2 && !in_array($file.'.conf', $site)){
                            echo "<span class='text-danger'>Veuillez créer un fichier de configuration nginx</span>";
                          }
                          if(in_array($file.'.conf', $site) && count($folder) > 2){
                            echo '<a target="_blank" href="http://' . $file . '.local" class="btn btn-warning">Voir avec nom de domaine</a>';
                          }

                        ?>
                      </td>
                    </tr>
                  <?php
                  }
                }
              closedir($dh); // on ferme la connection
            }
        ?>
    </tbody>
  </table>
</div>
