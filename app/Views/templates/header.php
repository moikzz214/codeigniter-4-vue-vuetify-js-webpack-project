<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
	<?php echo link_tag('src/bundle.css?v='.$version); ?>
</head>
<body>  
<div id="app"> 
  <v-app id="inspire"> 
  
    <v-navigation-drawer
      v-model="drawer"
      app
    >
      <v-list dense>
        <v-list-item href="/">
          <v-list-item-action>
            <v-icon>mdi-home</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Home</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <!-- <v-list-item href="registration">
          <v-list-item-action>
            <v-icon>mdi-email</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Register</v-list-item-title>
          </v-list-item-content>
        </v-list-item> -->
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      app
      color="indigo"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title><?=$title?></v-toolbar-title>
    </v-app-bar>

	<!-- <v-container class="d-flex justify-center logo-container">
		<div id="logo">
			<a href="https://grandiose.net/"> <img src="https://grandiose.net/wp-content/uploads/2019/10/grandiose-logo-v3.svg" alt="Grandiose Supermarket L.L.C." id="logo"  width="300" height="84"> </a>
		</div>
	</v-container>  -->
   