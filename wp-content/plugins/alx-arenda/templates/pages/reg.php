<div class="reg-block__right">
    <div class="open-lk">Открыть меню</div>
    <div class="reg-block__title">
        СОЗДАНИЕ И РЕДАКТИРОВАНИЕ АККАУНТА
    </div>
    <div class="reg-block__top">
        <form action="" class="form">
            <div class="reg-block__top-left">
                <div class="form__input">
                    <div class="form__input-name">Укажите логин<span>*</span></div>
                    <input type="text" name="name" id="name">
                </div>
                <div class="form__input">
                    <div class="form__input-name">Укажите номер телефона:<span>*</span></div>
                    <input type="text" name="phone" id="phone" class="js-input-mask" inputmode="text" placeholder="+7(___)___-__-__">
                </div>
                <div class="form__input">
                    <div class="form__input-name">Укажите адрес электронной почты:<span>*</span></div>
                    <input type="text" name="mail" id="mail">
                </div>
                <div class="reg-block__m-title">
                    Права доступа
                </div>
                <div class="reg-block__checks">
                    <div class="form__block form__block--check">
                        <input type="checkbox" name="check" id="check1" class="form__field form__field--check js-filter-check" checked="">
                        <label for="check1"><span>Менеджер</span></label>
                    </div>
                    <div class="form__block form__block--check">
                        <input type="checkbox" name="pay" id="chack3" class="form__field form__field--check js-filter-check">
                        <label for="chack3"><span> Главный администратор</span></label>
                    </div>
                    <div class="form__block form__block--check">
                        <input type="checkbox" name="check" id="check2" class="form__field form__field--check js-filter-check">
                        <label for="check2"><span>Тренер</span></label>
                    </div>
                    <div class="form__block form__block--check">
                        <input type="checkbox" name="pay" id="chack4" class="form__field form__field--check js-filter-check">
                        <label for="chack4"><span>Ученик</span></label>
                    </div>
                </div>
            </div>
            <div class="reg-block__top-right">
                <div class="form__input form__input--select">
                    <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                    <div class="form__input-name">Выберите абонемент:</div>
                    <select name="states[]" id="ggrgr" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="ggrgr" tabindex="-1" aria-hidden="true">
                        <option value="1">Бокс</option>
                        <option value="2">Карате</option>
                        <option value="3">Тайский бокс</option>
                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    <label class="form__input-label js-multi-label" for="ggrgr">Выбрать абонемент</label>
                </div>
                <div class="form__input form__input--select">
                    <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                    <div class="form__input-name">Выберите доступные акции:</div>
                    <select name="states2[]" id="trhr" multiple="" aria-labelledby="trhr" class="js-select select2-hidden-accessible" data-select2-id="trhr" tabindex="-1" aria-hidden="true">
                        <option value="1">Бокс</option>
                        <option value="2">Карате</option>
                        <option value="3">Тайский бокс</option>
                        <option value="4">Карате</option>
                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    <label class="form__input-label js-multi-label" for="trhr">Выбрать акцию</label>
                </div>
                <div class="form__input">
                    <div class="form__input-name">Укажите счет в рублях</div>
                    <input type="text" name="name" id="namgrgre">
                </div>
                <button class="button button--full button--big">
                    <span>Добавить аккаунт</span>
                </button>
            </div>
        </form>
    </div>
    <div class="reg-block__bottom">
        <div class="reg-block__b-title">
            РЕДАКТИРОВАНИЕ АККАУНТА
        </div>
        <div class="red-wrap">
            <div class="red-list">
                <div class="red-item red-item--top">
                    <div class="red-item__numb"></div>
                    <div class="form__input form__input--text">
                        Имя
                    </div>
                    <div class="form__input form__input--text">
                        Права доступа
                    </div>
                    <div class="form__input form__input--text">
                        Абонемент
                    </div>
                    <div class="form__input form__input--text">
                        Счет
                    </div>
                    <div class="del-block del-block--fake"></div>
                </div>
                <div class="red-item">
                    <div class="red-item__numb">
                        01
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="name2" placeholder="Введите имя">
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="98489" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="98489" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="NGFGN" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="NGFGN" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="4" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="namHTTHe2" placeholder="Введите счет">
                    </div>
                    <div class="del-block">
                        <div class="change-pass">Сменить пароль</div>
                        <div class="del-item">
                            <img src="<?=get_template_directory_uri();?>/img/del.png" alt="logo" width="26" height="26">
                            <span>Удалить</span>
                        </div>
                    </div>
                </div>
                <div class="red-item">
                    <div class="red-item__numb">
                        02
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="name233" placeholder="Введите имя">
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="55875" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="55875" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="NGkuykFGN" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="NGkuykFGN" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="6" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="kuykuy" placeholder="Введите счет">
                    </div>
                    <div class="del-block">
                        <div class="change-pass">Сменить пароль</div>
                        <div class="del-item">
                            <img src="<?=get_template_directory_uri();?>/img/del.png" alt="logo" width="26" height="26">
                            <span>Удалить</span>
                        </div>
                    </div>
                </div>
                <div class="red-item">
                    <div class="red-item__numb">
                        03
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="kyukyuu" placeholder="Введите имя">
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="kyukyukuy" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="kyukyukuy" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="7" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="htrhrh" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="htrhrh" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="8" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="hthr" placeholder="Введите счет">
                    </div>
                    <div class="del-block">
                        <div class="change-pass">Сменить пароль</div>
                        <div class="del-item">
                            <img src="<?=get_template_directory_uri();?>/img/del.png" alt="logo" width="26" height="26">
                            <span>Удалить</span>
                        </div>
                    </div>
                </div>
                <div class="red-item">
                    <div class="red-item__numb">
                        04
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="htrhtr" placeholder="Введите имя">
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="hrthrt" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="hrthrt" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="9" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="htrrhtr" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="htrrhtr" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="10" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="namHTThtrhrHe2" placeholder="Введите счет">
                    </div>
                    <div class="del-block">
                        <div class="change-pass">Сменить пароль</div>
                        <div class="del-item">
                            <img src="<?=get_template_directory_uri();?>/img/del.png" alt="logo" width="26" height="26">
                            <span>Удалить</span>
                        </div>
                    </div>
                </div>
                <div class="red-item">
                    <div class="red-item__numb">
                        05
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="nagregme2" placeholder="Введите имя">
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="98fefeeeee489" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="98fefeeeee489" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="11" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="NGgrgtgtFGN" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="NGgrgtgtFGN" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="12" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="htht" placeholder="Введите счет">
                    </div>
                    <div class="del-block">
                        <div class="change-pass">Сменить пароль</div>
                        <div class="del-item">
                            <img src="<?=get_template_directory_uri();?>/img/del.png" alt="logo" width="26" height="26">
                            <span>Удалить</span>
                        </div>
                    </div>
                </div>
                <div class="red-item">
                    <div class="red-item__numb">
                        06
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="nahththththme2" placeholder="Введите имя">
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="htrhrt" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="htrhrt" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="13" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="NGFhtrhtrGN" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="NGFhtrhtrGN" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="14" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="namHTThthHe2" placeholder="Введите счет">
                    </div>
                    <div class="del-block">
                        <div class="change-pass">Сменить пароль</div>
                        <div class="del-item">
                            <img src="<?=get_template_directory_uri();?>/img/del.png" alt="logo" width="26" height="26">
                            <span>Удалить</span>
                        </div>
                    </div>
                </div>
                <div class="red-item">
                    <div class="red-item__numb">
                        07
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="htrhrtht" placeholder="Введите имя">
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="984hrthtrhtrh89" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="984hrthtrhtrh89" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="15" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="htrhtrhtrhr" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="htrhtrhtrhr" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="16" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="hthtrhtrht" placeholder="Введите счет">
                    </div>
                    <div class="del-block">
                        <div class="change-pass">Сменить пароль</div>
                        <div class="del-item">
                            <img src="<?=get_template_directory_uri();?>/img/del.png" alt="logo" width="26" height="26">
                            <span>Удалить</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
