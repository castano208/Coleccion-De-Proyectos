package com.clecksoft.RestauranteInteligente.repositories;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.clecksoft.RestauranteInteligente.entities.UsuarioEntity;

@Repository("UsuarioJpaRepository")
public interface UsuarioJpaRepository extends JpaRepository<UsuarioEntity, Integer>{
	
	public abstract UsuarioEntity findByRol(String rol);
}
