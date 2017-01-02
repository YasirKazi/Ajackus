import { Component, OnInit } from '@angular/core';
import { Injectable, Inject } from '@angular/core';
import { Http, Response } from '@angular/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs/Observable';
import { Router } from '@angular/router'

@Component({
  selector: 'app-signin',
  templateUrl: './signin.component.html',
  styleUrls: ['./signin.component.css']
})

export class SigninComponent implements OnInit {
	user = {
		name:'John Doe',
		email:'john@requantive.com',
		phone:''
	}

  constructor( @Inject(Http) public http: Http, private router: Router) { 
        this.http = http;
  }

  ngOnInit() {
  }

  public signUp(){
	    this.http.post('/api/signup', this.user)
	    .map(res => res.json())
	    .subscribe(
	      data => this.saveResponse('complete'),
	      err => this.saveResponse('error'),
	      () => console.log('Authentication Complete')
	    );
	}

	saveResponse(response) {
	  if(response == 'error') { //since service is not active response is checking for error
	    this.router.navigate(['./thank-you']);
	  }
	}

  }
