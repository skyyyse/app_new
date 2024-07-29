

import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:new_app/screen/login_screen.dart';
import 'package:new_app/screen/main_screen.dart';
import 'package:new_app/screen/test.dart';

void main() {
  runApp(const new_app());
}
class new_app extends StatelessWidget {
  const new_app({super.key});

  @override
  Widget build(BuildContext context) {
    return  GetMaterialApp(
      debugShowCheckedModeBanner: false,
      home: login_screen(),
    );
  }
}