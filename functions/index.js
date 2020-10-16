const functions = require('firebase-functions');
const express = require('express');

// Get a database reference to our blog
var db = admin.database();
var ref = db.ref("https://pinapp-96d0a.firebaseio.com/");


var usersRef = ref.child("users");
usersRef.set({
  alanisawesome: {
    date_of_birth: "June 23, 1912",
    full_name: "Alan Turing"
  },
  gracehop: {
    date_of_birth: "December 9, 1906",
    full_name: "Grace Hopper"
  }
});