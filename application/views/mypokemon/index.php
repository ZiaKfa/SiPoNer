<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Pokemon</title>
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
  <div class="row">
    <div class="col text-center">
        <h1>List of Your Pokemon</h1>
    </div>
    <div class ="row">
        <div class="col text-left">
            <a href="<?= base_url('mypokemon/create'); ?>" class="btn btn-primary">Add Your Pokemon</a>
        </div>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nickname</th>
        <th scope="col">Name</th>
        <th scope="col">Element Type</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($pokemon as $p) : ?>
        <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $p['name']; ?></td>
            <td><?= $controller->name($p['pokemon_id']); ?></td>
            <td><?= $controller->element($p['pokemon_id']); ?></td>
            <td>
            <div class="btn-group" role="group">
              <a href="<?= base_url('mypokemon/edit/' . $p['name']); ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="<?= base_url('mypokemon/delete/' . $p['name']); ?>" class="btn btn-sm btn-danger">Delete</a>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
  </div>
  <p>Click <a href="<?= base_url('trainer'); ?>">here</a> to return to your page</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
