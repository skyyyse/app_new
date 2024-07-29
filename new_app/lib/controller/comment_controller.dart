import 'dart:convert';
import 'package:flutter/cupertino.dart';
import 'package:get/get.dart';
import 'package:get/get_state_manager/get_state_manager.dart';
import 'package:new_app/controller/post_controller.dart';
import 'package:new_app/controller/token.dart';
import 'package:new_app/model/comment_model.dart';
import 'package:http/http.dart' as http;
import 'package:new_app/screen/home/comment.dart';
class comment_controller extends GetxController {
  final add_comment=TextEditingController();
  var comments = <comment_model>[].obs;
  final post_controller post = Get.put(post_controller());
  var loading = false.obs;
  var id,count_comment;
  final url = 'http://10.0.2.2:8000/api/comment/';
  token_controller token=Get.put(token_controller());
  @override
  void onInit() {
    fetchPosts();
    super.onInit();
  }
  void getid(id){
    this.id=id;
    fetchPosts();
  }

  Future<void> fetchPosts() async {
    try {
      loading.value = true;
      final response = await http.get(
        Uri.parse(url+"get?id=${id}"),
        headers: {
          "Authorization": "Bearer ${token.data['token']}",
          'Content-Type': 'application/json',
        },
      );
      if (response.statusCode == 200) {
        loading.value = false;
        final List<dynamic> jsonList = json.decode(response.body)['comment'];
        post.fetchPosts();
        comments.assignAll(jsonList.map((json) => comment_model.fromjson(json)).toList());
      }
    } catch (e) {
      Get.snackbar('Error', 'An error occurred: $e');
      print(e);
    } finally {
      loading.value = false;
    }
  }
  void store(int post_id,String comment)async{
    try {
      loading.value = true;
      final response = await http.get(
        Uri.parse(url+"store?id=${id}&comment=${comment}"),
        headers: {
          "Authorization": "Bearer ${token.data['token']}",
          'Content-Type': 'application/json',
        },
      );
      if (response.statusCode == 200) {
        loading.value = false;
        fetchPosts();
      }else {
        Get.snackbar('Error', 'Failed to fetch posts');
      }
    } catch (e) {
      Get.snackbar('Error', 'An error occurred: $e');
      print(e);
    } finally {
      loading.value = false;
    }
  }

  void delete(int id)async{
    try {
      loading.value = true;
      final response = await http.get(
        Uri.parse(url+"delete?id=${id}"),
        headers: {
          "Authorization": "Bearer ${token.data['token']}",
          'Content-Type': 'application/json',
        },
      );
      if (response.statusCode == 200) {
        loading.value = false;
        print('111111111111111');
        fetchPosts();
      }else {
        Get.snackbar('Error', 'Failed to fetch posts');
      }
    } catch (e) {
      Get.snackbar('Error', 'An error occurred: $e');
      print(e);
    } finally {
      loading.value = false;
    }
  }
}