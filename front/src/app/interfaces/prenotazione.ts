export interface Prenotazione {
  id_prenotazione   :number
  id_ricetta        :number
  id_struttura      :number
  id_reparto        :number
  id_operatore      :number
  id_utente         :number
  id_prestazione    :number
  data_prenotazione :string
  priorita_richiesta:string
}
