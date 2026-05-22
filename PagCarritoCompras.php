<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\entidades\Plato.php';
        session_start();
        ?>

        <noscript data-n-head="ssr" data-hid="gtm-noscript" data-pbody="true"><iframe
            src="//www.googletagmanager.com/ns.html?id=GTM-WXGZS79&l=dataLayer" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

        <div data-v-4dd02cac="" class="st-menu-active">
            <nav id="menu-3" class="st-menu st-effect-3" data-v-4dd02cac="">
                <div class="sidebar-red-bar" data-v-4dd02cac=""><a href="index.php" class="st-close" data-v-4dd02cac=""></a>
                    <div class="sidebar-red-bar-txt" data-v-4dd02cac=""><b data-v-4dd02cac="">PIDIENDO DESDE</b> <b
                            data-v-4dd02cac=""><span class="nw">Abancay 1</span></b></div>
                </div>
                <div class="cart-body" data-v-4dd02cac="">
                    <div data-v-4dd02cac="" class="notice-incar">
                        <div data-v-4dd02cac="" class="car-cupon-w hide-desktop"><strong data-v-4dd02cac="">Cupón de descuento:
                            </strong>
                            <div data-v-4dd02cac="" class="car-cupon"><input data-v-4dd02cac="" type="text" name="" value=""
                                                                             placeholder="Digita Codigo para buscar"> <a data-v-4dd02cac="" href="" class="btn btn-apply-cupon">Aplicar
                                    <!----></a> <!----> <!----></div>
                        </div>
                    </div>
                    <ul data-v-4dd02cac="" class="cart-items-col">



<?php
$subtotal = 0;
$totalapagar = 0;

foreach ($_SESSION["matriz"] as $carrito) {
    ?> 
                            <li data-v-4dd02cac="" class="">
                                <div data-v-4dd02cac="" class="cart-item-txts-w">
                                    <div data-v-4dd02cac="" class=""><img data-v-4dd02cac=""
                                                                          data-src=""
                                                                          alt="" class="standard-pre-img"
                                                                          src="<?php echo $carrito->getRutaimagen() ?>">
                                    </div>
                                    <div data-v-4dd02cac="" class="cart-item-txts"><b data-v-4dd02cac=""> 
    <?php echo $carrito->getTitulo() ?>
                                        </b>
                                        <p data-v-4dd02cac=""><?php echo $carrito->getDescripcion() ?></p> <!---->
                                        <div data-v-4dd02cac="" class="cart-minigrid">
                                            <div data-v-4dd02cac="" class="minigrid-rw"><b data-v-4dd02cac="">Precio</b> <span
                                                    data-v-4dd02cac="">
    <?php echo $carrito->getPrecio() ?>

                                                </span></div>
                                            <div data-v-4dd02cac="" class="minigrid-rw"><b data-v-4dd02cac="">Cantidad</b> <span
                                                    data-v-4dd02cac="">
    <?php echo $carrito->getCantidad() ?>


                                                </span></div>
                                        </div>
                                        <div data-v-4dd02cac="" class=" ">
                                            <a href="controller/CarritoController.php?retornoidplato=<?php echo $carrito->getIdplato() ?>&&retornocatplato=<?php echo $carrito->getIdcatplato() ?>">  
                                                <button data-v-4dd02cac="" class="btn">MODIFICAR</button> 
                                            </a>
                                            <a href="controller/CarritoController.php?idplato=<?php echo $carrito->getIdplato() ?>&&idcatplato=<?php echo $carrito->getIdcatplato() ?>">  
                                                <button                                            
                                                    data-v-4dd02cac="" class="btn btn-no">ELIMINAR
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
    <?php
    $subtotal = ($carrito->getPrecio() * $carrito->getCantidad());
    $totalapagar = $totalapagar + $subtotal;
}
?> 


                    </ul>
                    <div data-v-4dd02cac="" class="sumary-minigrid">
                        <div data-v-4dd02cac="" class="sumary-minigrid-rw"><b data-v-4dd02cac="">Subtotal:</b> <span
                                data-v-4dd02cac="">S/ <?php echo $totalapagar ?></span></div>

                        <div data-v-4dd02cac="" class="sumary-minigrid-rw sumary-minigrid-rw-totales"><b
                                data-v-4dd02cac="">Total:</b> <span data-v-4dd02cac="">S/ <?php echo $totalapagar ?></span></div>
                    </div>
                </div> <!---->
                <div data-v-4dd02cac="" class="sidebar-sumary-details">
                    <div data-v-4dd02cac="" class="sumary-minigrid">
                        <div data-v-4dd02cac="" class="sumary-minigrid-rw"><b data-v-4dd02cac="">Subtotal:</b> <span
                                data-v-4dd02cac="">S/125.50</span></div>
                        <div data-v-4dd02cac="" class="sumary-minigrid-rw" style="display: none;"><b
                                data-v-4dd02cac="">Delivery:</b> <span data-v-4dd02cac="">S/ 0.00</span></div>
                        <div data-v-4dd02cac="" class="sumary-minigrid-rw" style="display: none;"><b
                                data-v-4dd02cac="">Descuento:</b> <span data-v-4dd02cac="">- S/ 0.00</span></div>
                        <div data-v-4dd02cac="" class="sumary-minigrid-rw sumary-minigrid-rw-totales"><b
                                data-v-4dd02cac="">Total:</b> <span data-v-4dd02cac="">S/ 125.50</span></div>
                    </div>
                    <div data-v-4dd02cac="" class="sumary-minigrid-action">
                        <div data-v-4dd02cac="" class="summary-amount-message" style="display: none;"><span data-v-4dd02cac=""
                                                                                                            class="error">

                            </span></div>
                        <a href="PagPagos.php">  
                            <button data-v-4dd02cac="" class="btn btn-lg">REALIZAR COMPRA <!----></button>
                        </a>
                        <a href="index.php">
                            <button
                                data-v-4dd02cac="" class="btn btn-lg btn-no">SEGUIR COMPRANDO
                            </button>
                        </a>
                    </div>
                </div>
            </nav> <span class="sidebar-overlay" style="display: flex;" data-v-4dd02cac=""></span>
        </div>
        <script>window.__NUXT__ = (function (a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z, A) { return { layout: "default", data: [{ productDetail: { entity_id: 2605, type_id: "bundle", sku: "SKU_CYBERROKYS_1\u002F4POLLO_PAPA_ENSALADA_GASEOSA__7218", available: e, attribute_set_id: n, aws_s3: e, meta_title: a, meta_keyword: a, meta_description: a, jnq_has_dedication: b, jnq_is_subscription: i, is_giftcard: i, description: o, short_description: o, jnq_terms_and_conditions: a, name: "1\u002F4 pollo +papas + ensalada + gaseosa", jnq_code: "7218", jnq_diameter: a, jnq_related_sku: a, jnq_forbid_sale: f, jnq_forbid_message: a, pj_store_list: e, jnq_shipping_availability: e, is_symphony: f, is_pollito: b, product_as_coupon: f, coupon_brands: g, coupon_type: g, coupon_type_value: g, coupon_time: g, coupon_stores: g, coupon_min: f, coupon_max: f, images: [{ store_id: f, label: a, position: j, image: k, aws_s3: e }], categories: [j, p, q], options: [{ option_id: 1507, title: "ELIGE TU BEBIDA", type: "radio", required: b, is_recipe: f, qty_min: f, qty_max: b, selections: [{ selection_id: 4667, product_id: 2481, name: "GASEOSA INCA KOLA PERSONAL", pixel_code: "171", sku: "SKU_GASEOSA_INCA_KOLA_PERSONAL_171_200", image: r, status: b, price: l, selection_price_value: l, selection_qty: b, position: b, is_default: b, type_id: s, aws_s3: e, available: e, available_message: a, jnq_recommended_suscription: i }, { selection_id: 4668, product_id: 2299, name: "GASEOSA COCA COLA PERSONAL", pixel_code: "1667", sku: "SKU_GASEOSA_PERSONAL_1667_200", image: r, status: b, price: l, selection_price_value: l, selection_qty: b, position: d, is_default: f, type_id: s, aws_s3: e, available: e, available_message: a, jnq_recommended_suscription: i }] }], image: k, small_image: k, thumbnail: k, price: t, original_price: t }, catLink: "\u002Fcarta\u002Fcombos-personales", situation: u, selectionobj: { "1507": a }, is_subs: c, idUser: v, detailLoaded: e, params_extra: v, the_category: w }], fetch: [], error: g, state: { routerLoadingEnable: e, returnToLandingSorteo: c, auth: { info_customer: g, quote_id: 809374, token: a, userId: a, redis_token: "QC1gVhiak7pyelrDADpdGrIJyXAtUdXQi3yOHFUEKAfAM99ARMEttmHZln6bqt1d", is_logged: c, my_preferences: [], user_address: g, store_selected: g }, account: { session_satus: c, list_order: {}, action: {} }, general: { show_preference: c, issuetoolbar: f, emailConfirmation: a, list_order: {}, languages: [{ store_id: b, code: x, name: "Español", sort_order: f }, { store_id: d, code: "en", name: "Inglés", sort_order: b }], lang: x, settings_amounts: { maxAmount: { active: e, amount: "400", error_message: "Su pedido supera el monto máximo de compra de 400, por favor llamar al 6135000 Callcenter Rokys" }, minAmount: { active: e, amount: y, error_message: "Su pedido no supera el monto mínimo de compra: 29.90", minimum_pickup: y } }, preferences: [{ tag_id: b, name: "Azúcar" }, { tag_id: d, name: "Maní" }, { tag_id: j, name: "Sugar" }, { tag_id: n, name: "Coco" }, { tag_id: 5, name: "Almendras" }, { tag_id: 6, name: "Pecanas" }, { tag_id: z, name: "Pasas" }], csrfToken: "oWXShMlW-t7W25lti9UaflqNi_1QyLUn7EfE", csrfSecret: "xza5XzK3IssHV5-wn0Rwb6nM", settings_ubigeos: {}, shippingMethod: a, localComp: "store", loadApplyCupon: c }, headerAndFooter: { menusPadres: [{ name: "NUESTRA CARTA", link: "\u002Fcarta\u002Ftortas-postres" }, { name: "BLOG", link: "\u002Fblog" }, { name: "CONTACTO", link: "\u002Fcontacto\u002F" }], subMenusPadres: [], socialMedia: [{ link: a, image: "https:\u002F\u002Fcdn-images-pj-admin-devel.s3.amazonaws.com\u002Fmedia\u002Fnetsocials\u002Ficon_facebook.png" }, { link: a, image: "https:\u002F\u002Fcdn-images-pj-admin-devel.s3.amazonaws.com\u002Fmedia\u002Fnetsocials\u002Ficon_twitter.png" }, { link: a, image: "https:\u002F\u002Fcdn-images-pj-admin-devel.s3.amazonaws.com\u002Fmedia\u002Fnetsocials\u002Ficon_instagram.png" }], menuPadreElegido: a, historia: { anterior: {}, actual: {} }, firstCategory: A, categoryList: [{ entity_id: j, parent_id: d, level: d, blocking: f, name: "PROMOCIONES", meta_title: a, url_key: A, url_type: a, image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Fpromociones-01.svg", is_active: b, include_in_menu: b, description: a, meta_keywords: a, meta_description: a, home_image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Fpollo_brasa_1.png", location: h, aws_s3: e, sub: [] }, { entity_id: q, parent_id: d, level: d, blocking: f, name: "COMBOS PERSONALES", meta_title: a, url_key: w, url_type: a, image: g, is_active: b, include_in_menu: b, description: a, meta_keywords: a, meta_description: a, home_image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Fpersonales.jpg", location: m, aws_s3: c, sub: [] }, { entity_id: 64, parent_id: d, level: d, blocking: f, name: "COMBOS PARA 2", meta_title: a, url_key: "combos-para-2", url_type: a, image: g, is_active: b, include_in_menu: b, description: a, meta_keywords: a, meta_description: a, home_image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002F361x297-combos-para-2_1.jpg", location: m, aws_s3: c, sub: [] }, { entity_id: 65, parent_id: d, level: d, blocking: f, name: "COMBOS FAMILIARES", meta_title: a, url_key: "combos-familiares", url_type: a, image: g, is_active: b, include_in_menu: b, description: a, meta_keywords: a, meta_description: a, home_image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002F361x297-combos-familiares_1.jpg", location: m, aws_s3: c, sub: [] }, { entity_id: 70, parent_id: d, level: d, blocking: f, name: "PROMOS MÁGICAS", meta_title: a, url_key: "promos-magicas", url_type: a, image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Ficono-promos-magicas-nuevo.svg", is_active: b, include_in_menu: b, description: a, meta_keywords: a, meta_description: a, home_image: g, location: "category", aws_s3: e, sub: [] }, { entity_id: 72, parent_id: d, level: d, blocking: f, name: "CORNER ROKY´S", meta_title: a, url_key: "corner-rokys", url_type: a, image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Fcorner-rokys_1.svg", is_active: b, include_in_menu: b, description: a, meta_keywords: a, meta_description: a, home_image: g, location: h, aws_s3: e, sub: [] }, { entity_id: p, parent_id: d, level: d, blocking: f, name: "ROKY'S BRASA", meta_title: a, url_key: "roky-s-brasa", url_type: a, image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Frokys-brasa-1.svg", is_active: b, include_in_menu: b, description: a, meta_keywords: a, meta_description: a, home_image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Fpollos-a-la-brasa-rokys-peru.png", location: h, aws_s3: e, sub: [] }, { entity_id: 7, parent_id: d, level: d, blocking: f, name: "PARRILLAS", meta_title: a, url_key: "parrillas", url_type: a, image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Fparrillas-01.svg", is_active: b, include_in_menu: b, description: a, meta_keywords: a, meta_description: a, home_image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002FCATEGORI_A_PARRILLAS_1.jpg", location: h, aws_s3: e, sub: [] }, { entity_id: z, parent_id: d, level: d, blocking: f, name: "FUSIÓN CRIOLLA", meta_title: a, url_key: "fusion-criolla", url_type: a, image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Ffusion_criolla-01.svg", is_active: b, include_in_menu: b, description: a, meta_keywords: a, meta_description: a, home_image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002FCATEGORI_A_CRIOLLOS.jpg", location: h, aws_s3: e, sub: [] }, { entity_id: 58, parent_id: d, level: d, blocking: f, name: "BROASTER", meta_title: a, url_key: "broaster", url_type: a, image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Fpollo-broaster.svg", is_active: b, include_in_menu: b, description: a, meta_keywords: a, meta_description: a, home_image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Fbroaster.jpg", location: h, aws_s3: e, sub: [] }, { entity_id: 61, parent_id: d, level: d, blocking: f, name: "HAMBURGUESAS", meta_title: a, url_key: "hamburguesas", url_type: a, image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Fhamburguesas_1.svg", is_active: b, include_in_menu: b, description: a, meta_keywords: a, meta_description: a, home_image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Fhamburguesas.png", location: h, aws_s3: e, sub: [] }, { entity_id: 59, parent_id: d, level: d, blocking: f, name: "ENSALADAS", meta_title: a, url_key: "ensaladas", url_type: a, image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002FEnsaladas.svg", is_active: b, include_in_menu: b, description: a, meta_keywords: a, meta_description: a, home_image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Fensalada_rokys.png", location: h, aws_s3: e, sub: [] }, { entity_id: 62, parent_id: d, level: d, blocking: f, name: "DESAYUNOS", meta_title: a, url_key: "desayunos", url_type: a, image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002FDESAYUNOS_1.png", is_active: b, include_in_menu: b, description: a, meta_keywords: a, meta_description: a, home_image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002FDesayuno_caterogia_web.jpg", location: h, aws_s3: e, sub: [] }, { entity_id: 66, parent_id: d, level: d, blocking: f, name: "VALES", meta_title: a, url_key: "vales", url_type: a, image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Fpromociones-01_1.svg", is_active: b, include_in_menu: b, description: a, meta_keywords: a, meta_description: a, home_image: "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fcategory\u002Fvale-default_1.jpeg", location: h, aws_s3: e, sub: [] }], menuFooter: [{ name: "Carta", link: "\u002Fcarta" }, { name: "Promociones", link: "\u002Fcarta\u002Fpromociones" }, { name: "Locales", link: "\u002Flocales" }, { name: "Nosotros", link: "\u002Fnosotros" }, { name: "Venta corporativa", link: "\u002Fventa-corporativa" }, { name: "Eventos \u002F Cumpleaños", link: "\u002Feventos" }], pageSituation: "public", sidebarCart: c, respMenu: c, showAlert: c, alertParams: { situation: "alert" }, blockheader1: a, blockheaderresp: a, blockfooter1: a, blockfooter2: a, blockfooter3: a, fromLabel: a, pageThread: u }, locales: {}, modals: { storeSelector: c, newAddress: c, newCard: c, pauseSubs: c, shareSubs: c, newSubs: c, subsCards: c, relatedProducts: c, deleteConfirmation: c, emailFb: c, showPreferences: c, terms: c, useTerms: c, privacy: c, addressSelector: c, paymentMethods: c, recommend: c, productItemTerm: c, productItemTermCtn: a, termsSorteo: c, dataSorteo: c }, shoppingCart: { cartDetails: {}, shippingMethods: { delivery: "Delivery", pickup: "Recojo en Tienda" }, cartDetailsIssue: c }, stores: { listStores: [] }, i18n: { routeParams: {} } }, serverRendered: e, routePath: "\u002Fcarta\u002Fpromociones\u002Fcyber-rokys-1-4-pollo-papa-ensalada-gaseosa-2605.html" } }("", 1, false, 2, true, 0, null, "all", "0", 3, "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fproduct\u002F1\u002F-\u002F1-4-de-pollo-papas-ensalada-gaseosa-sept-nyevo-cyber-day.jpg", "0.00", "home", 4, "CYBER ROKYS 1\u002F4 POLLO + PAPA + ENSALADA + GASEOSA", 27, 63, "https:\u002F\u002Fs3-rokys-pro.s3.amazonaws.com\u002Fmedia\u002Fcatalog\u002Fproductnull", "simple", "20.90", "carta", void 0, "combos-personales", "es", "1", 10, "promociones"));</script>
        <script src="https://d3uqmu8cgrse7a.cloudfront.net/dist/client/f44cbbeca0da7cf5b07b.js" defer=""></script>
        <script src="https://d3uqmu8cgrse7a.cloudfront.net/dist/client/9ec7ccbe9dfea10d10b1.js" defer=""></script>
        <script src="https://d3uqmu8cgrse7a.cloudfront.net/dist/client/407af243d09640bfe783.js" defer=""></script>
        <script src="https://d3uqmu8cgrse7a.cloudfront.net/dist/client/c8f9300af1ceb3a03c79.js" defer=""></script>
        <script src="https://d3uqmu8cgrse7a.cloudfront.net/dist/client/cb7c04b1a93f2270126f.js" defer=""></script>
        <script src="https://d3uqmu8cgrse7a.cloudfront.net/dist/client/a93c584fcff405f19b8c.js" defer=""></script>


        <div id="fb-root" class=" fb_reset">
            <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
                <div>

                </div>
            </div>
        </div>




    </body>
</html>
