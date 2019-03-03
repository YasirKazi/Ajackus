import { Component, OnInit } from '@angular/core';
import { GenericHeaderComponent } from '../generic-header/generic-header.component';

declare let $: any

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  constructor() { }

  ngOnInit() {
    $(document).ready(function () {
      $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
            nav: true
          },
          600: {
            items: 2,
            nav: false
          },
          900: {
            items: 3,
            nav: false
          },
          1000: {
            items: 4,
            nav: true,
            loop: false,
            margin: 20
          }
        }
      })
    })
  }

}
