export interface Utente {
  id_utente             :number
  ut_nome               :string
  ut_cognome            :string
  ut_sesso              :string
  ut_codice_fiscale     :string

  ut_luogo_nascita      :string
  ut_data_nascita       :string
  ut_cittadinanza       :string
  ut_comune_residenza   :string
  ut_indirizzo_residenza:string
  ut_cap_residenza      :string
  ut_comune_domicilio   :string
  ut_indirizzo_domicilio:string
  ut_cap_domicilio      :string

  tipo_documento        :string
  numero_documento      :string
  rilascio_documento    :string
  scadenza_documento    :string
  
  ut_recapito_tel1      :string
  ut_recapito_tel2      :string
  ut_mail               :string
  ut_password           :string

  codice_esenzione      :string
  ut_ultimo_accesso     :string
  ut_connessione        :string
  ut_scad_password      :boolean
  ut_data_inserimento   :string
  ut_data_modifica      :string
  ut_data_scadenza      :string
}
