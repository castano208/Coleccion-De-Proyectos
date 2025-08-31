package com.clecksoft.RestauranteInteligente.repositories;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import com.clecksoft.RestauranteInteligente.entities.RestauranteEntity;

@Repository("RestauranteJpaRepository")
public interface RestauranteJpaRepository extends JpaRepository<RestauranteEntity, Integer>{
	
	public abstract RestauranteEntity findByNombre(String nombre);
}
