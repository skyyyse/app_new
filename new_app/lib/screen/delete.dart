import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:get/get_core/src/get_main.dart';
import 'package:get/get_instance/get_instance.dart';
import 'package:get/get_navigation/get_navigation.dart';
import 'package:new_app/controller/comment_controller.dart';

final comment_controller controller = Get.put(comment_controller());
final data = Get.arguments;
void delete_function() {
  Get.dialog(
    AlertDialog(
      elevation: 0,
      shape: OutlineInputBorder(
        borderRadius: BorderRadius.circular(0),
      ),
      title: Container(
        child: Column(
          children: [
            Text('data'),
          ],
        ),
      ),
      actions: [
        TextButton(
          onPressed: () {
            Get.back(); // Close the dialog
          },
          child: Text("Close"),
        ),
      ],
    ),
  );
}

void update() {}
