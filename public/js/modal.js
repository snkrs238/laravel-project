$(function () {
    $('#modalOpen').on('show.bs.modal',function(e){
        setTimeout(function(){
            var modal = $(e.target);
            var button = $(e.relatedTarget);
            var name = button.data("name");
            var id =button.data('id');
            var image =button.data('image');
            var type = button.data("type");
            if(type == 1){
                type ='野菜'
            }else if(type == 2){
                type = '果物'
            }else if(type == 3){
                type = '肉類'
            }else if(type == 4){
                type = '魚介類'
            }
            var production_aria = button.data("production_aria");
            switch(production_aria){
                case 1 :
                    production_aria= '北海道' ;
                break;
                case 2 :
                    production_aria='青森県'; 
                break;
                case 3 :                    
                    production_aria='岩手県' ; 
                break;
                case 4 :                    
                    production_aria='宮城県' ;
                break;
                case 5 :                   
                    production_aria='秋田県' ;
                break;
                case 6 :                   
                    production_aria='山形県';
                break;
                case 7 :                   
                    production_aria='福島県';
                break;
                case 8 :                 
                    production_aria='茨城県' ;
                break;
                case 9 :                  
                    production_aria='栃木県' ;
                break;
                case 10 :
                    production_aria='群馬県'; 
                break;
                case 11 :
                    production_aria='埼玉県'; 
                break;
                case 12 :
                    production_aria='千葉県' ;
                break;
                case 13 :
                    production_aria='東京都'; 
                break;
                case 14 :                    
                    production_aria='神奈川県'; 
                break;
                case 15 :
                    production_aria='新潟県'; 
                break;
                case 16 :
                    production_aria='富山県'; 
                break;
                case 17 :
                    production_aria='石川県'; 
                break;
                case 18 :
                    production_aria='福井県'; 
                break;
                case 19 :
                    production_aria='山梨県'; 
                break;
                case 20 :
                    production_aria='長野県'; 
                break;
                case 21 :
                    production_aria='岐阜都'; 
                break;
                case 22 :
                    production_aria='静岡県'; 
                break;
                case 23 :
                    production_aria='愛知県'; 
                break;
                case 24 :
                    production_aria='三重県'; 
                break;
                case 25 :
                    production_aria='滋賀県'; 
                break;
                case 26 : 
                    production_aria='京都府'; 
                break;
                case 27 :
                    production_aria= '大阪府'; 
                break;
                case 28 :
                    production_aria='兵庫県'; 
                break;
                case 29  :
                    production_aria='奈良県'; 
                break;
                case 30 :                    
                    production_aria='和歌山県' ;
                break;
                case 31 :
                    production_aria='鳥取県' ;
                break;
                case 32 :
                    production_aria='島根県' ;
                break;
                case 33 :
                    production_aria='岡山県' ;
                break;
                case 34 :
                    production_aria='広島県' ;
                break;
                case 35 :
                    production_aria='山口県' ;
                break;
                case 36 :
                    production_aria='徳島県' ;
                break;
                case 37 :
                    production_aria='香川県' ;
                break;
                case 38 :
                    production_aria='愛媛県' ;
                break;
                case 39 :
                    production_aria='高知県' ;
                break;
                case 40 :
                    production_aria='福岡県' ;
                break;
                case 41 :
                    production_aria='佐賀県' ;
                break;
                case 42 :
                    production_aria='長崎県' ;
                break;
                case 43 :
                    production_aria='熊本県' ;
                break;
                case 44 :
                    production_aria='大分県' ;
                break;
                case 45 :
                    production_aria= '宮崎県' ;
                break;
                case 46 :                 
                    production_aria='鹿児島県' ;
                break;
                case 47 :
                    production_aria='沖縄県' ;
                break;
            }

            var price = button.data("price");
            var quantity = button.data("quantity");
            var detail = button.data("detail");
            modal.find('.modal-name').text(name);
            modal.find('.modal-id').text(id);
            modal.find('modal-image').attr('src');
            modal.find('.modal-type').text(type);
            modal.find('.modal-production_aria').text(production_aria);
            modal.find('.modal-price').text(price);
            modal.find('.modal-quantity').text(quantity);
            modal.find('.modal-detail').text(detail);
            console.log(image);
            console.log(name);
        },300);
    });
});