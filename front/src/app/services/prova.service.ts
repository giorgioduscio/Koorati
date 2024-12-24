import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ProvaService {
  prova =['dati da provaService']
  constructor(private http:HttpClient){ }
}
