import { Component } from '@angular/core';
import { RouterModule } from '@angular/router';
import { RouterDropdownComponent } from "../router-dropdown/router-dropdown.component";
import { SerchbarComponent } from "../serchbar/serchbar.component";

@Component({
  selector: 'app-navbar',
  imports: [RouterModule, RouterDropdownComponent, SerchbarComponent],
  styleUrl: './navbar.component.sass',
  templateUrl:'./navbar.component.html',
})
export class NavbarComponent {
  title =document.title
  // utilizzare lo style bootstrap nei file sass
}
