import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:new_app/screen/favorite_screen.dart';
import 'package:new_app/screen/home_screen.dart';
import 'package:new_app/screen/video_screen.dart';

class main_screen extends StatefulWidget {
  main_screen({super.key});

  @override
  State<main_screen> createState() => _main_screenState();
}

class _main_screenState extends State<main_screen> {
  List page = [
    home_screen(),
    video_screen(),
    favorite_screen(),
  ];

  int index = 0;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: page[index],
      bottomNavigationBar: BottomNavigationBar(
        currentIndex: index,
        onTap: (int value) {
          setState(() {
            this.index = value;
          });
        },
        type: BottomNavigationBarType.fixed,
        items: const [
          BottomNavigationBarItem(icon: Icon(Icons.newspaper_rounded), label: "News"),
          BottomNavigationBarItem(icon: Icon(Icons.slow_motion_video_sharp), label: "News"),
          BottomNavigationBarItem(icon: Icon(Icons.favorite), label: "Favorite"),
        ],
      ),
    );
  }
}
