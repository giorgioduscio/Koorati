import { Component } from '@angular/core';
import { routes } from '../../app.routes';
import { RouterModule } from '@angular/router';
import { NgFor } from '@angular/common';

@Component({
  selector: 'app-router-dropdown',
  imports: [RouterModule, NgFor],
  styleUrl: './router-dropdown.component.sass',

  template:`
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" 
        href="#" 
        role="button" 
        data-bs-toggle="dropdown" 
        aria-expanded="false"
      >
        Pagine
      </a>
      <ul class="dropdown-menu">
        <!-- <li><hr class="dropdown-divider"></li> -->
        <li *ngFor="let page of routes; let i=index">
          <a class="dropdown-item" routerLink="/{{ page.path }}">{{ page.path }}</a>
        </li>
      </ul>
    </li>
  `
})
export class RouterDropdownComponent {
  routes =routes
    .filter(page=>page.path!=='')
}
