import 'package:get/get.dart';
import 'package:new_app/screen/home/comment.dart';

import '../delete_comment.dart';

void delete_function(comment_user_id,comment_id,user_id){
  Get.bottomSheet(
    delete_comment(comment_user_id:comment_user_id,comment_id:comment_id,user_id:user_id),
    enableDrag: false,
    isScrollControlled: false,
    elevation: 0,
  );
}