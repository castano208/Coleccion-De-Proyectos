package com.clecksoft.RestauranteInteligente.controllers;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import com.clecksoft.RestauranteInteligente.entities.UsuarioEntity;
import com.clecksoft.RestauranteInteligente.models.Usuario;
import com.clecksoft.RestauranteInteligente.services.imp.UsuarioServiceImp;

@Controller
@RequestMapping("/registro")
public class RegistroController {

	@Autowired
	@Qualifier("UsuarioServiceImp")
	private UsuarioServiceImp usuarioService;

	@GetMapping("registrar")
	public String registrar(Model modelo) {		
			modelo.addAttribute("usuario", new Usuario());				
			return "registro/registrar";		
	}	
	
	@PostMapping("registrarUsuario")
	public String registrarUsuario(Model modelo, UsuarioEntity usuario) {	
		modelo.addAttribute("usuario", new Usuario());	
			modelo.addAttribute("usuario", usuario);
			usuarioService.crearUsuario(usuario);	
			return "registro/registrar";		
	}
}
