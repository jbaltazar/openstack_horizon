<?php

class Openstack {

	public function generate_token()
	{
		/*
		$token = '{
		    "auth": {
		        "identity": {
		            "methods": [
		                "password"
		            ],
		            "password": {
		                "user": {
		                    "domain": {
		                        "name": "Default"
		                    },
		                    "name": "'._OPENSTACK_ADMIN_USR_.'",
		                    "password": "'._OPENSTACK_ADMIN_PWD_.'"
		                }
		            }
		        },
		        "scope": {
		            "project": {
		                "domain": {
		                    "id": "default"
		                },
		                "name": "'._OPENSTACK_DEFAULT_PROJECT_.'"
		            }
		        }
		    }
		}';
		*/

		$token = '{
		    "auth": {
		        "identity": {
		            "methods": [
		                "password"
		            ],
		            "password": {
		                "user": {
		                    "domain": {
		                        "name": "Default"
		                    },
		                    "name": "'._OPENSTACK_ADMIN_USR_.'",
		                    "password": "'._OPENSTACK_ADMIN_PWD_.'"
		                }
		            }
		        },
		        "scope": {
		            "project": {
		                "id": "'._OPENSTACK_DEFAULT_PROJECT_ID_.'"
		            }
		        }
		    }
		}';

		return $token;
	}

	public function generate_register_user_template($data)
	{
		$register_user = '{
		    "user": {
		            "default_project_id": "'._OPENSTACK_DEFAULT_PROJECT_ID_.'",
		            "description": "Description",
		            "domain_id": "default",
		            "email": "'.$data['email'].'",
		            "enabled": true,
		            "name": "'.$data['username'].'",
		            "password": "'.$data['password'].'" }
		}';

		return $register_user;
	}

	public function openstack_portal($mode, $data,$extra_id)
	{
		$curl_cmd = "";
		#TOKEN GENERATE
		$token = $this->generate_token();

		$curl_token = "export TOKEN=`curl -si -d '".$token."' -H ";
		$curl_token.= '"Content-type: application/json" ';
		$curl_token.= _OPENSTACK_API_URL_."auth/tokens | awk '/X-Subject-Token/ {print $2}'`";

		switch($mode) {
			case "USER_INFO":
					/*
					 * This is for listing specific user information
					 * Note: This is just for sample coding
					 */
					$curl_cmd = "curl -si -H";
					$curl_cmd.= '"X-Auth-Token:$TOKEN" -H "Content-type:application/json" ';
					$curl_cmd.= _OPENSTACK_API_URL_."users/".$extra_id;

					//EXECUTE COMMAND
					$curl_cmd = $curl_token." && ".$curl_cmd;
					$result = shell_exec($curl_cmd);
					print_r($result);
			break;
			case "REGISTER_USER":
					/*
					 * This is for user registration via API v3
					 */
					$register_user = $this->generate_register_user_template($data);
					$curl_cmd = "curl -si -H";
					$curl_cmd.= '"X-Auth-Token:$TOKEN" -H "Content-type: application/json" ';
					$curl_cmd.= _OPENSTACK_API_URL_."users -d '".$register_user."'";
						//EXECUTE COMMAND
						$curl_cmd = $curl_token." && ".$curl_cmd;
						shell_exec($curl_cmd);

						//GET USER ID
						$ci = & get_instance();
						$ci->load->model("keystone_model", "keystone_settings");
						$user_id = $ci->keystone_settings->get_user($data['username']);

					/*
					 * This is for Granting Role to User for specific Project
					 */
					$curl_cmd.= " && curl -X PUT -H";
					$curl_cmd.= '"X-Auth-Token:$TOKEN" -H "Content-type: application/json" ';
					$curl_cmd.= _OPENSTACK_API_URL_."projects/"._OPENSTACK_DEFAULT_PROJECT_ID_."/users/".$user_id."/roles/"._OPENSTACK_DEFAULT_ROLE_ID_;
						//EXECUTE COMMAND
						$curl_cmd = $curl_token." && ".$curl_cmd;
						shell_exec($curl_cmd);
			break;
		}

	}

}

?>