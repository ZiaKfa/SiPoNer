<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Pokemon</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Pokebola-pokeball-png-0.png" alt="pokeball" width="30" height="24" class="d-inline-block align-text-top">
      SiPoNer
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Home</a>
        </li>
      </ul>
      <div class="d-flex">
          <a class="nav-link" href="#">Login</a>
      </div>
    </div>
  </div>
</nav>
<div class="container align-items-center justify-content-center">
    <h1>Add Your Pokemon Data</h1>
  <form action="<?= base_url('mypokemon/store'); ?>" method="post">
    <div class="mb-3">
      <label for="name" class="form-label">Nickname</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class = "mb-3">
        <label for="pokemon_name" class="form-label">Pokemon Type</label>
        <select class="form-select" id="pokemon_id" name="pokemon_id">
            <?php foreach($pokemon as $p) : ?>
                <option value="<?= $p['id'] ?>"><?= $p['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="hidden" name="trainer_id" value ="<?= $this->session->userdata('id') ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
