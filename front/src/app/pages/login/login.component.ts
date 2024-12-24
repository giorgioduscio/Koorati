import { Component } from '@angular/core';
import { ProvaService } from '../../services/prova.service';

@Component({
  selector: 'app-login',
  imports: [],
  templateUrl: './login.component.html',
  styleUrl: './login.component.sass'
})
export class LoginComponent {
  constructor(public provaService: ProvaService){
    console.log(provaService.prova);
    
  }
}
