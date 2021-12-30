var convert_taxonomy_obj = function(array) {
                        var this_obj = new Object();
                        if( typeof array == "object" ){
                            for( var i in array ){
                                var thisEle = convert_taxonomy_obj(array[i]);
                                this_obj[i] = thisEle;
                            }
                        }else {
                            this_obj = array;
                        }
                        return this_obj;
                    }