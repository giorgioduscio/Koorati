import { Component } from '@angular/core';

@Component({
  selector: 'app-serchbar',
  imports: [],
  styleUrl: './serchbar.component.sass',
  template:`
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  `,
})
export class SerchbarComponent {

}
