import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:get/get_core/src/get_main.dart';
import 'package:get/get_instance/get_instance.dart';
import 'package:get/get_navigation/get_navigation.dart';
import 'package:http/http.dart';
import 'package:new_app/controller/comment_controller.dart';
import 'package:new_app/screen/delete.dart';
import 'package:new_app/screen/home/comment.dart';
final comment_controller controller = Get.put(comment_controller());
final data = Get.arguments;
void Comment_function() {
  Get.bottomSheet(
    comment(),
    enableDrag: true,
  );
}
