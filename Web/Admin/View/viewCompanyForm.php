<label for="companyName">Nom de l'entreprise : <input type="text" id="companyName" name="companyName" required value="<?= \Core\Lib\App::write($company[0]->companyName) ?>"></label>
<label for="companyAdress">Adresse : <input type="text" id="companyAdress" name="companyAdress" required value="<?= $company[0]->companyAdress ?>"></label>
<label for="companyCodePostal">Code Postal : <input type="text" id="companyCodePostal" name="companyCodePostal" required value="<?= $company[0]->companyCodePostal ?>"></label>
<label for="companyCity">Ville : <input type="text" id="companyCity" name="companyCity" required value="<?= $company[0]->companyCity ?>"></label>
<label for="companySiren">Numéro de Siren : <input type="text" id="companySiren" name="companySiren" required value="<?= $company[0]->companySiren ?>"></label>
<label for="companyPhoneNumber">Numéro de téléphone : <input type="tel" id="companyPhoneNumber" name="companyPhoneNumber" required value="<?= $company[0]->companyPhoneNumber ?>"></label>
<label for="companyCostHour">Tarif Horaire : <input type="text" id="companyCostHour" name="companyCostHour" required value="<?= $company[0]->companyCostHour ?>"> €/H </label>

