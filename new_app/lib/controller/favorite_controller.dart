import 'dart:convert';
import 'package:get/get.dart';
import 'package:get/get_state_manager/get_state_manager.dart';
import 'package:new_app/controller/token.dart';
import 'package:new_app/model/favorite_model.dart';
import 'package:new_app/model/post_model.dart';
import 'package:http/http.dart' as http;

class favorite_controller extends GetxController {
  var favorites = <favorite_model>[].obs;
  var loading = false.obs;
  token_controller token = Get.put(token_controller());
  @override
  void onInit() {
    fetchfavorite();
    super.onInit();
  }

  Future<void> fetchfavorite() async {
    final url = 'http://10.0.2.2:8000/api/favorite/get';
    try {
      loading.value = true;
      final response = await http.get(
        Uri.parse(url),
        headers: {
          "Authorization": "Bearer ${token.data['token']}",
          'Content-Type': 'application/json',
        },
      );
      if (response.statusCode == 200) {
        loading.value = false;
        final List<dynamic> jsonList = json.decode(response.body)['favorite'];
        favorites.assignAll(
            jsonList.map((json) => favorite_model.fromjson(json)).toList());
      } else {
        Get.snackbar('Error', 'Failed to fetch posts');
      }
    } catch (e) {
      Get.snackbar('Error', 'An error occurred: $e');
      print(e);
    } finally {
      loading.value = false;
    }
  }

  void unfovorite(int id) async {
    print(id);
    final url = 'http://10.0.2.2:8000/api/favorite?id=${id}';
    try {
      loading.value = true;
      final response = await http.get(
        Uri.parse(url),
        headers: {
          "Authorization": "Bearer ${token.data['token']}",
          'Content-Type': 'application/json',
        },
      );
      if (response.statusCode == 200) {
        loading.value = false;
        fetchfavorite();
        Get.snackbar('Sucess', 'Delete sucessfull....');
        // fetchfavorite();
      } else {
        Get.snackbar('Error', 'Failed to fetch posts');
      }
    } catch (e) {
      Get.snackbar('Error', 'An error occurred: $e');
      print(e);
    } finally {
      loading.value = false;
    }
  }

  void addfovorite(int id) async {
    final url = 'http://10.0.2.2:8000/api/favorite?id=${id}';
    try {
      loading.value = true;
      final response = await http.get(
        Uri.parse(url),
        headers: {
          "Authorization": "Bearer ${token.data['token']}",
          'Content-Type': 'application/json',
        },
      );
      if (response.statusCode == 200) {
        loading.value = false;
        Get.snackbar('Sucess', 'Add favorite sucessfull....');
        fetchfavorite();
      } else {
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
