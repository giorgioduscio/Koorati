export interface Agenda {
  id_agenda               :number
  descrizione             :string
  festività               :string
  disponibilità_operatori :string
  disponibilità_reparto   :string
  disponibilità_posti     :string
  priorità_richiesta      :string
  id_reparto              :number
  id_struttura            :number
  id_prestazione          :number
  id_operatore            :number
  id_utente               :number
}
